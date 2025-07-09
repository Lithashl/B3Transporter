<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pickup;
use App\Models\PickupHistory;
use App\Models\RequestPickup;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pickup = Pickup::all();
        $requestpickups = RequestPickup::all();
        $all_users = User::all();
        $menu_section = 'dashboard';
        $pending = '';
        $ongoing = '';
        $completed = '';
        $canceled = '';
        if($user -> role == 'admin'){
            $pending = RequestPickup::where('status', '=', 'waiting for decision')->count();
            $ongoing = RequestPickup::where('status', '=', 'Picked')->count();
            $completed = RequestPickup::where('status', '=', 'Completed')->count();
            $canceled = PickupHistory::where('status', '=', 'Cancelled')->count();
        }
        else if($user -> role == 'customer'){
            $pending = RequestPickup::where([
                ['cust_email', '=', $user -> email],
                ['status', '=', 'waiting for decision']
                ])->count();
            $ongoing = RequestPickup::where([
                ['cust_email', '=', $user -> email],
                ['status', '=', 'Picked']
                ])->count();
            $completed = RequestPickup::where([
                ['cust_email', '=', $user -> email],
                ['status', '=', 'Completed']
                ])->count();
            $canceled = PickupHistory::where([
                ['cust_email', '=', $user -> email],
                ['employee_email', '=', '-'],
                ['status', '=', 'Cancelled']
                ])->count();

        }
        else if($user -> role == 'employee'){

        }

        $status = [$pending, $ongoing, $completed, $canceled];
        $data = [$user, $pickup, $requestpickups, $all_users, $menu_section, $status];
        return view('dashboard')->with('data',$data);
    }
}
