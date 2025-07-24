<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestPickup;
use App\Models\Pickup;
use App\Models\PickupHistory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ThirdSideBarController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $requestpickup = null;
        $users = null;
        $pickups = null;

        if ($user->role === 'admin') {
            $users = User::where('role', 'employee')->get();
        } elseif ($user->role === 'customer') {
            $requestpickup = RequestPickup::where('cust_email', $user->email)->get();
            $users = User::all();
        } else {
            $pickups = Pickup::where('employee_email', $user->email)->get();
            $requestpickup = RequestPickup::all();
            $users = User::all();
        }

        $menu_section = 'thirdsidebar';

        return view('thirdsidebar')->with([
            'data' => [$user, $requestpickup, $users, $pickups, $menu_section]
        ]);
    }

    public function update($req_id, $pickup_id)
    {
        RequestPickup::where('id', $req_id)->update([
            'pickup_id' => $pickup_id,
            'status' => 'Picked'
        ]);

        return redirect('/thirdsidebar');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if (!empty($request->request_id)) {
            return $this->handlePickup($request, $user);
        }

        if ($request->has('complete')) {
            return $this->employee_action($request, 'complete');
        }

        if ($request->has('cancel')) {
            return $this->employee_action($request, 'cancel');
        }

        if ($request->has('cust_cancel_request')) {
            return $this->customer_action($request);
        }

        if ($request->has('employee_register')) {
            return $this->handleEmployeeRegistration($request);
        }

        return redirect('/thirdsidebar');
    }

    private function handlePickup(Request $request, $user)
    {
        $pickup = Pickup::create([
            'employee_email' => $user->email,
        ]);

        $this->update($request->request_id, $pickup->id);

        return redirect('/thirdsidebar')->with('success', 'Pickup berhasil dilakukan.');
    }

    private function handleEmployeeRegistration(Request $request)
    {
        if (strlen($request->employee_password) < 8) {
            return redirect('/thirdsidebar')->with('error', 'Password minimal 8 karakter!');
        }

        if ($request->employee_password !== $request->employee_c_password) {
            return redirect('/thirdsidebar')->with('error', 'Password tidak sama!');
        }

        if ($request->employee_register === 'Ubah') {
            return $this->updateEmployee($request);
        }

        if (User::where('email', $request->employee_email)->exists()) {
            return redirect('/thirdsidebar')->with('error', 'Email sudah terdaftar!');
        }

        User::create([
            'name' => $request->employee_name,
            'email' => $request->employee_email,
            'password' => Hash::make($request->employee_password),
            'phone_number' => $request->employee_phone_number,
            'role' => 'employee'
        ]);

        return redirect('/thirdsidebar')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    private function updateEmployee(Request $request)
    {
        User::where('id', $request->employee_id)->update([
            'name' => $request->employee_name,
            'email' => $request->employee_email,
            'password' => Hash::make($request->employee_password),
            'phone_number' => $request->employee_phone_number,
        ]);

        return redirect('/thirdsidebar')->with('success', 'Data karyawan berhasil diubah!');
    }

    public function employee_action($request, $action)
    {
        $status = '';

        if ($action === 'complete') {
            RequestPickup::where('id', $request->action_request_id)->update(['status' => 'Completed']);
            $status = 'Completed';
        } elseif ($action === 'cancel') {
            RequestPickup::where('id', $request->action_request_id)->update([
                'status' => 'waiting for decision',
                'pickup_id' => null
            ]);
            Pickup::where('id', $request->pickup_id)->delete();
            $status = 'Cancelled';
        }

        PickupHistory::create([
            'cust_email' => $request->cust_email,
            'cust_name' => $request->cust_name,
            'employee_email' => $request->employee_email,
            'employee_name' => $request->employee_name,
            'volume' => $request->volume,
            'status' => $status,
        ]);

        return redirect('/thirdsidebar')->with('success', 'Pickup berhasil ' . strtolower($status) . '.');
    }

    public function customer_action($request)
    {
        RequestPickup::where('id', $request->cust_cancel_request_id)->delete();

        PickupHistory::create([
            'cust_email' => $request->cust_email,
            'cust_name' => $request->cust_name,
            'employee_email' => '-',
            'employee_name' => '-',
            'volume' => $request->volume,
            'status' => $request->status,
        ]);

        return redirect('/thirdsidebar')->with('success', 'Request berhasil dibatalkan.');
    }

    public static function getPickup($id)
    {
        return RequestPickup::where('pickup_id', $id)->first();
    }

    public static function getEmployeeName($id_pickup)
    {
        $pickup = Pickup::find($id_pickup);
        $employee = User::where('email', $pickup->employee_email)->first();
        return $employee?->name ?? '-';
    }
}
