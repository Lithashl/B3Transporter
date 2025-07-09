<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\RequestPickup;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public static function get_notif_count($user){
        if($user->role == 'employee'){
            $count = RequestPickup::where('status', '=', 'waiting for decision')->count();
            return $count;
        }
        else{
            $count = RequestPickup::where([
                ['cust_email', '=', $user->email],
                ['status', '=', 'Picked'],
                ])->count();
            return $count;
        }
        
    }
}
