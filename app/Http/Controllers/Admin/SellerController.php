<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SellerModel;
use App\Models\Admin;


class SellerController extends Controller{
     // adminData
     public function adminData()
     {
         $admin = Admin::find(session('admin'));
         return $admin;
 
     }

    public function sellerPage()
    {
        $admin = self::adminData();
        $seller = SellerModel::orderBy('sellerId','DESC')->paginate(10);
        return view('admin.dashboard.seller.view_seller',['seller'=>$seller,'admin'=>$admin]);
    }
}