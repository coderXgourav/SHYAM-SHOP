<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use App\Models\Admin;

class CustomerController extends Controller{
    // adminData
    public function adminData()
    {
        $admin = Admin::find(session('admin'));
        return $admin;

    }
    // customerPage
    public function customerPage()
    {
        $adminData = self::adminData();
        $customers = UserModel::orderBy('id','DESC')->paginate(10);
        return view('admin.dashboard.customer.view_customer',['admin'=>$adminData,'customer'=>$customers]);
    }


}