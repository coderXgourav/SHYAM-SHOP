<?php 

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\UserModel;
use Crypt;
use Session;

class UserController extends Controller{
    public function getProductsForHomePage()
    {
        $data = ProductModel::count();
        if($data>0){
            $data = ProductModel::orderBy('productId','DESC')->paginate(8);
        }else{
          $data = ['message'=>"Product Not Found !"];
        }
        return json_encode($data);

    }
    public function registerUser(Request $request)
    {
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $number = $request->phoneNumber;
        $password = $request->password;

        if(!$firstName || !$lastName || !$email || !$number || !$password){
        return response()->json(['status'=>false,'icon'=>"error",'message'=>'Please Fill all required fields.']);
        }
     
        $check_email = UserModel::where('email',$email)->count();
        $check_number = UserModel::where('phone_number',$number)->count();
        if($check_email>0 || $check_number>0 ){
            return response()->json([
                'status'=>false,'icon'=>"warning",
              'message'=>"Email or Phone Number Already Registered."
            ]);
        }

        try {
            $registerUser = new UserModel;
            $registerUser->first_name = $firstName;
            $registerUser->last_name = $lastName;
            $registerUser->email = $email;
            $registerUser->phone_number = $number;
            $registerUser->password = $password;
            $registerUser->save();
            return response()->json([
                'status'=>true,'icon'=>"success",
            'message'=>'Registration Successfull'
            ]);
           
        } catch (\Throwable $th) {
              return response()->json([
                'message'=>'Registered Failed'
                ]);
        }
    }

    // userLogin 
    public function userLogin(Request $request)
    {
        $email = $request->email;
        $number = $request->number;
        $password = $request->password;
        
        if(!$email && !$number ){
            return response()->json(['status'=>false,'icon'=>"error",'message'=>'Please Fill Required Fields']);
        }
        $usernameCheck = UserModel::where('email',$email)
        ->orWhere('phone_number',$number)->first();
        if($usernameCheck){
          if($usernameCheck->password == $password){
            session()->put('userId',$usernameCheck->id);
            return response()->json(['status'=>true,'icon'=>"success",'message'=>'Login Successfull']);
          }else{
            return response()->json(['status'=>false,'icon'=>"error",'message'=>'Wrong Password.']);
          }
        }else{
            return response()->json(['status'=>false,'icon'=>"error",'message'=>'Please Check Email or Number']);
        }


    }
    
    
}