<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RequestPickup;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        
        return redirect('thirdsidebar');
    }
    public function view_chat(Request $request)
    {
        $user = Auth::user();
        $requestpickup = RequestPickup::find($request->request_pickup_id);
        if($user->role == 'customer'){
            $chat = Chat::all()->where('request_pickup_id', '=', $request->request_pickup_id);
            $chatwith = $request->employee_name;
            $label = ['Transporter Staff', 'Volume', 'Address', 'Note', 'Date', 'Time', 'Status'];
            $datetime = explode(' ', $requestpickup->datetime);
            $details = [$chatwith, $requestpickup->volume, $requestpickup->address, $requestpickup->notes, $datetime[0], $datetime[1],$requestpickup->status];
        }
        else if($user->role == 'employee'){
            $chat = Chat::all()->where('request_pickup_id', '=', $request->request_pickup_id);
            $chatwith = $request->cust_name;
            $label = ['Customer', 'Volume', 'Address', 'Note', 'Date', 'Time', 'Status'];
            $datetime = explode(' ', $requestpickup->datetime);
            $details = [$chatwith, $requestpickup->volume, $requestpickup->address, $requestpickup->notes, $datetime[0], $datetime[1],$requestpickup->status];
        }
        $data = [$user, $requestpickup, $chatwith, $chat, $label, $details];
        return view('chat')->with('data',$data);
    }
    public function send_chat(Request $request)
    {
        if($request->request_pickup_id == null)
        {
            return redirect('thirdsidebar');
        }
        else{
            $user = Chat::create([
                'request_pickup_id' => $request->request_pickup_id,
                'message' => $request->message,
                'role' => $request->role,
            ]);
            $data = Chat::all()->where('request_pickup_id', '=', $request->request_pickup_id);
            $this->view_message($data, $request->role);
        }
        

    }
    public static function view_message($data, $role){
        foreach($data as $chat)
        {
            $time = explode(" ", $chat->updated_at);
            $time = explode(":", $time[1]);
            if($role == $chat->role){
                echo '
                <div class="c_chat-cust-frame68">
                    <div class="c_chat-cust-frame69">
                        <div class="c_chat-cust-text86">
                            <p class="c_chat-cust-text87">
                                '.$chat->message.'
                            </p>
                            <div class="c_chat-cust-text92">
                                <p class="c_chat-cust-text93">'.$time[0].':'.$time[1].'</p>
                            </div>
                        </div>
                    </div>
                </div>';
            }    
            else{
                echo '
                <div class="c_chat-cust-frame70">
                    <div class="c_chat-cust-frame71">
                        <div class="c_chat-cust-frame72">
                            <div class="c_chat-cust-text90">
                                <p class="c_chat-cust-text91">
                                    '.$chat->message.'
                                </p>
                                <div class="c_chat-cust-text92">
                                    <p class="c_chat-cust-text93">'.$time[0].':'.$time[1].'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }
    }
}
