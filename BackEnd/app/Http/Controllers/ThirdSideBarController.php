<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestPickup;
use App\Models\Pickup;
use App\Models\PickupHistory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ThirdSideBarController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $var = '';
        if($user->role == 'admin'){
            $requestpickup = '';
            $users = User::all()->where('role', '=', 'employee');
            $pickups='';
        }
        else if($user-> role == 'customer'){
            $requestpickup = RequestPickup::all() -> where('cust_email','=', $user->email);
            $pickups = '';
            $users = User::all();
        }
        else{
            $pickups = Pickup::all()->where('employee_email','=', $user->email);
            $requestpickup = RequestPickup::all();
            $users = User::all();
        }
        $menu_section = 'thirdsidebar';
        $data = [$user, $requestpickup, $users, $pickups, $menu_section];
        return view('thirdsidebar')->with('data',$data);
    }
    public function update($req_id, $pickup_id)
    {
        $update = RequestPickup::where('id', '=', $req_id)->update(['pickup_id'=>$pickup_id, 'status'=>'Picked']);
        return redirect(('/thirdsidebar'));

    }
    public function store(Request $request)
    {
        $user = Auth::user();
    
        // pick section for employee
        if ($request->request_id != '') {
            $pickup = Pickup::create([
                'employee_email' => $user->email,
            ]);
    
            $this->update($request->request_id, $pickup->id);
            return redirect('/thirdsidebar')->with('success', 'Pickup berhasil dilakukan.');
        }
    
        // complete for employee
        if (isset($request->complete)) {
            return $this->employee_action($request, 'complete');
        }
    
        // cancel for employee
        if (isset($request->cancel)) {
            return $this->employee_action($request, 'cancel');
        }
    
        // customer cancels request
        if (isset($request->cust_cancel_request)) {
            return $this->customer_action($request);
        }
    
        // employee add or update
        if (isset($request->employee_register)) {
            if (strlen($request->employee_password) < 8) {
                return redirect('/thirdsidebar')->with('error', 'Password minimal 8 karakter!');
            }
    
            if ($request->employee_register == 'Ubah') {
                if ($request->employee_password !== $request->employee_c_password) {
                    return redirect('/thirdsidebar')->with('error', 'Password tidak sama!');
                }
    
                User::where('id', $request->employee_id)->update([
                    'name' => $request->employee_name,
                    'email' => $request->employee_email,
                    'password' => Hash::make($request->employee_password),
                    'phone_number' => $request->employee_phone_number,
                ]);
    
                return redirect('/thirdsidebar')->with('success', 'Data karyawan berhasil diubah!');
            }
    
            // Tambah karyawan baru
            $check_email = User::where("email", $request->employee_email)->count();
            if ($check_email > 0) {
                return redirect('/thirdsidebar')->with('error', 'Email ' . $request->employee_email . ' sudah terdaftar!');
            }
    
            if ($request->employee_password !== $request->employee_c_password) {
                return redirect('/thirdsidebar')->with('error', 'Password tidak sama!');
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
    
        return redirect('/thirdsidebar');
    }

    public function employee_action($request, $action)
    {
        $status = '';
        if ($action == 'complete')
        {
            $update = RequestPickup::where('id', '=', $request->action_request_id)->update(['status'=>'Completed']);
            $status = 'Completed';
            echo '<script>alert("Pickup berhasil!")</script>';
        }
        else if($action == 'cancel')
        {
            $update = RequestPickup::where('id', '=', $request->action_request_id)->update(['status'=>'waiting for decision']);
            $update = RequestPickup::where('id', '=', $request->action_request_id)->update(['pickup_id'=>NULL]);
            $delete = Pickup::where('id', '=', $request->pickup_id)->delete();
            $status = 'Cancelled';
            echo '<script>alert("Pickup dibatalkan")</script>';
        }
        $pickup_history = PickupHistory::create([
            'cust_email' => $request->cust_email,
            'cust_name' => $request->cust_name,
            'employee_email' => $request->employee_email,
            'employee_name' => $request->employee_name,
            'volume' => $request->volume,
            'status' => $status,
        ]);
        return redirect(('/thirdsidebar'));
    }
    public function customer_action($request)
    {
        $delete = RequestPickup::where('id', '=', $request->cust_cancel_request_id)->delete();
        echo '<script>alert("Request dibatalkan")</script>';

        $pickup_history = PickupHistory::create([
            'cust_email' => $request->cust_email,
            'cust_name' => $request->cust_name,
            'employee_email' => '-',
            'employee_name' => '-',
            'volume' => $request->volume,
            'status' => $request->status,
        ]);
    }
    // public function check_email(Request $request){
    //     return Redirect::index();
    // }

    public static function getPickup($id) {
        $requestpickup = RequestPickup::where('pickup_id','=',$id)->first();
        return $requestpickup;
    }
    public static function getEmployeeName($id_pickup){
        $email = Pickup::find($id_pickup);
        $employee = User::where('email', '=', $email->employee_email)->first();
        return $employee->name;
    }
    
}
