<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Session;

class LoginController extends Controller {

        // adminData
        public function adminData()
        {
            $admin = Admin::find(session('admin'));
            return $admin;
    
        }

      // toastr 
  public function toastr($refresh,$status,$icon,$title,$desc){
    $response = [
     'refresh'=>$refresh,
     'status'=>$status,
     'icon'=>$icon,
     'title'=>$title,
     'desc'=>$desc,
   ];
   echo json_encode($response);
   }
   // toastr 

    public function adminLogin (Request $request)
    { 
        $loginCheck = Admin::where(
            [
                ['email',$request->email],
                ['password',$request->password]
            ]
        )->first();

        if($loginCheck){
            session()->put('admin',$loginCheck->admin_id);
            self::toastr(false,true,'success','Success','Login Successfull');
           
        }else{
            self::toastr(false,false,'error','Error','Incorrect Credentials');
        }
    }
    // adminDashboard
    public function adminDashboard()
    {
        $admin = self::adminData();
        return view('admin.dashboard.index',['admin'=>$admin]);

    }

    // logout
    public function logout()
    {
        session()->forget('admin');
        return redirect('/admin');
    }

}