<?php

namespace App\Http\Controllers;

use App\Models\RequestPickup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Kolirt\Openstreetmap\Facade\Openstreetmap;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RequestPickupController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $date = Carbon::today()->toDateString();
        $menu_section = 'requestpickup';
        $var2 = ['','','','',''];
        $map = Openstreetmap::search('sidosermo 4', 10);
        // echo "<script>alert('".$map."')</script>";
        $data = [$user, $date, $map, $var2, $menu_section];
        return view('requestpickup')->with('data',$data);
    }
    public function store(Request $request)
    {
        if(isset($request -> notes)){
            $notes = $request -> notes;
        }
        else{
            $notes = '';
        }
        $file = $request->file('upload');
        $url_img = "uploads/".$file->getClientOriginalName();
        $uploadOk = 1;
        $imageFileType = strtolower($file->getClientOriginalExtension());
        // $imageFileType = strtolower(pathinfo($url_img,PATHINFO_EXTENSION));
        $notification = "";

        // Check if file already exists
        //
        $start = 1;
        while (file_exists($url_img)) {
            $url_img = "uploads/".$file->getClientOriginalName()."(".$start.")".$file->getClientOriginalExtension();
            $start++;
        }

        // Check file size
        if ($file->getSize() >= 300000 ) {
            $notification = $notification."File terlalu besar. ";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ){
            $notification = $notification."File bukan termasuk jpg, png, jpeg. ";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('Maaf request tidak dapat diterima, karena file upload tidak sesuai.')</script>";
            $input = [$request->volume, $request->address, $request->time, $notes, $notification];
            $menu_section = 'requestpickup';
            $data = [$request, $request->date, '', $input, $menu_section];
            return view('requestpickup')->with('data',$data);
        // if everything is ok, try to upload file
        } else {
            $file->move("uploads",$file->getClientOriginalName());
            $user = RequestPickup::create([
                'cust_email' => $request->email,
                'volume' => $request->volume,
                'address' => $request->address,
                'notes' => $notes,
                'url_img' => $url_img,
                'datetime' => $request->date." ".$request->time,
                'status' => "waiting for decision",
            ]);
            echo "<script>alert('Request Pickup Already Created!')</script>";
            return redirect("/thirdsidebar");
        }
    }

    // public function upload_cek(Request $request){

    // }

}
