<?php
namespace App\Http\Controllers;

use App\Models\PickupHistory;
use Illuminate\Support\Facades\Auth;

class PickupHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user -> role == 'admin'){
            $pickup_history = PickupHistory::all();

        }
        elseif ($user -> role == 'customer'){
            $pickup_history = PickupHistory::all()->where ('cust_email', '=', $user -> email);

        }
        // employee
        else{
            $pickup_history = PickupHistory::all()->where ('employee_email', '=', $user -> email);
        }
        
        $menu_section = 'pickuphistory';
        $data = [$user, $pickup_history,'','',$menu_section];
        return view('pickuphistory')->with('data',$data);
    }
}
