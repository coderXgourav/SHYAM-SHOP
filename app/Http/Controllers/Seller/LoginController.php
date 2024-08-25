<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerModel;
use Crypt;

class LoginController extends Controller
{

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
    public function checkUsername($userName){
        $count = SellerModel::where('username',$userName)->first();

        if($count){
          $response = array(
            'refresh'=> false,
            'status' => false,
             'icon' => "error",
             "title" => "Error",
             "desc"=>"This Username already exist"
           );
        }else{
          $response = array(
            'refresh'=> false,
            'status' => true,
             'icon' => "success",
             "title" => "success",
             "desc"=>"Ok"
           );
       
        } 
          return $response;
    }
    
     public function checkEmail($email){
        $count = SellerModel::where('email',$email)->first();
        if($count){
          $response = array(
           'refresh'=> false,
           'status' => false,
            'icon' => "error",
            "title" => "Error",
            "desc"=>"This Email already exist"
          );
          
        }else{
          $response = array(
            'refresh'=> false,
            'status' => true,
             'icon' => "success",
             "title" => "Success",
             "desc"=>"Ok"
           );
        } 
        return $response;
     
    }
    
    // signup 
    public function signup(Request $request){
       $usernameExist =  $this->checkUsername($request->username);
      if($usernameExist['status']==true){
        $emailExist = $this->checkEmail($request->email);
        if($emailExist['status']==true){
            $signUp = new SellerModel;
            $signUp->seller_name = $request->name; 
            $signUp->username = $request->username; 
            $signUp->email = $request->email; 
            $signUp->password = encrypt($request->password); 
            $signUp->save();
            $request->session()->put('seller',$signUp->sellerId);

            $response = array(
              'refresh'=> false,
              'status' => true,
               'icon' => "success",
               "title" => "Success",
               "desc"=>"Signed up successfull"
             );
             
        }else{
        $response = $emailExist;
        }
      }else{
        $response = $usernameExist;
      }
      echo json_encode($response);
    }
    // signup 
  
    // login 
    public function login(Request $request)
    {
      $username = $request->username;
      $password = $request->password;
      
      $usernameExist = SellerModel::where('email',$username)->orWhere('username',$username)->first();
      if($usernameExist){   
        $passwordCheck = decrypt($usernameExist->password) == $password;
        if($passwordCheck){
          $response = array(
            'refresh'=> false,
            'status' => true,
             'icon' => "success",
             "title" => "Success",
             "desc"=>"Login Successgull"
           );
        $request->session()->put('seller',$usernameExist->sellerId);
        }else{
          $response = array(
            'refresh'=> false,
            'status' => false,
             'icon' => "error",
             "title" => "Error",
             "desc"=>"Incorrect Password"
           );
        }
      }else{
        $response = array(
          'refresh'=> false,
          'status' => false,
           'icon' => "error",
           "title" => "Error",
           "desc"=>"Incorrect Username or Email"
         );
      }
      echo json_encode($response);
      
    }
    // login 
    // sellerDashboard 
    public function sellerDashboard()
    {
      $sellerId = session('seller');
      $sellerData = SellerModel::find($sellerId);
      return view('seller.dashboard.index',['seller'=>$sellerData]);
    }
    // sellerDashboard 
    // logout
    public function logout(Request $request){
      $request->session()->forget('seller');
     return redirect('/seller');
      
    }
    // logout

    // changeCredential 
     public function changeCredential(Request $request)
     {
      $seller = SellerModel::find(session('seller'));
      $password = decrypt($seller->password);
      return view('seller.dashboard.credential.change_credential',['seller'=>$seller,'password'=>$password]);
     }

    // changeCredential 

    // updateCredential
    public function updateCredential(Request $request)
    {
     $email = $request->email;
     $username = $request->username;
     $password = $request->password;

     $updateCredential = SellerModel::find(session('seller'));
     $updateCredential->email=$email;
     $updateCredential->username=$username;
     $updateCredential->password=encrypt($password);
     $update = $updateCredential->save();
     $update?self::toastr(false,true,'success','Success','Credential Updated'):toastr(false,false,'error','Error','Credential Update Failed');
    }
    // updateCredential


}