<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\RequestPickup;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NewRequestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $requestpickup = RequestPickup::all();
        $users = User::all();
        $menu_section = 'newrequest';
        $var = '';
        $data = [$user, $requestpickup, $users, $var, $menu_section];
        return view('newrequest')->with('data',$data);
    }
    public static function getEmployeeName($pickup_id)
    {
        $pickup = Pickup::find($pickup_id);
        // $pickup = Pickup::all()->where('id', '=', $pickup_id);
        $employee = User::where('email','=', $pickup->employee_email)->first();
        // $employee = User::all() -> where('email','=',$pickup->employee_email);
        echo $employee->name;
        // return $result;
    }
}
