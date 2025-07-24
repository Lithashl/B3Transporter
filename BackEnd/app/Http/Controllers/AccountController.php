<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Pickup;
use App\Models\RequestPickup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;


class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $menu_section = 'account';
        $data = [$user, '', '', '', $menu_section, ''];
        return view('account')->with('data',$data);
    }
    public function save_change(Request $request){
        if ($request->password != '' && $request->c_password != ''){
            if($request->password == $request->c_password){
                if(strlen($request->password) >= 8){
                    $update = User::where('id', '=', $request->id_user)
                        ->update(
                            [
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'password'=>Hash::make($request->password),
                                'phone_number'=>$request->phone_number,
                            ]
                        );
                    echo '<script>alert("Berhasil disimpan!")</script>';
                }
                // else for less than 8
                else{
                    echo '<script>alert("Password minimal 8 karakter!")</script>';
                }
            }
            else{
                echo '<script>alert("Password tidak sama")</script>';
            }
            
        }
        else if ($request->password == '' && $request->c_password == ''){
            $update = User::where('id', '=', $request->id_user)
                ->update(
                    [
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone_number'=>$request->phone_number,
                    ]
                );
            echo '<script>alert("Berhasil disimpan!")</script>';
        }
        else{
            echo '<script>alert("Mohon isi data dengan benar!")</script>';
        }

        $user = Auth::user();
        $menu_section = 'account';
        $data = [$user, '', '', '', $menu_section, ''];
        return view('account')->with('data',$data);
    }
}
