<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerModel;
use Crypt;
use App\Models\SellerCategoryModel;

class SellerCategoryController extends Controller
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
  
  // swal
  public function swal($status,$icon,$title,$desc){
    $response = [
     'status'=>$status,
     'icon'=>$icon,
     'title'=>$title,
     'desc'=>$desc,
   ];
   echo json_encode($response);
   }
  // swal

  public function addCategoryPage(Request $request)
  {
    $seller = SellerModel::find(session('seller'));
    return view('seller.dashboard.category.addCategory',['seller'=>$seller]);
  }
  public function viewCategory()
  {
    $seller = SellerModel::find(session('seller'));
    $allCategoryData = SellerCategoryModel::where('category_admin',session('seller'))->orderBy('category_id','DESC')->paginate(10);
    return view('seller.dashboard.category.viewCategory',['seller'=>$seller,'data'=>$allCategoryData]);
    
  }

  // addCategory
  public function addCategory(Request $request)
  {
      $category_name = $request->category_name;
      $category_photo = $request->category_photo;
      $imgExt = $category_photo->getClientOriginalExtension();
      $imageName = time() . '.' . $imgExt;
      
      $check_new_category = SellerCategoryModel::where([['category_name',$category_name],['category_admin',session('seller')]])->count();
      if($imgExt=="png"||$imgExt=="jpg"||$imgExt=="jpeg"||$imgExt=="webp"){
        $category_photo->move('category', $imageName);

        if($check_new_category>0){
          return self::toastr(false,false,"warning", "Warning","This Category Already exist");
      }else{
        $category_data = new SellerCategoryModel;
        $category_data->category_name = $category_name;
        $category_data->category_admin = session('seller');
        $category_data->category_image = $imageName;
        $save = $category_data->save();
        if($save){
          return self::toastr(false,true,"success", "Success","Category Saved");
  
        }else{
          return self::toastr(false,false,"error", "Error","something wrong , please try again later");
        }
      
      }

      }else{
        return self::toastr(false,false,"error", "Error","Choose Image only , please try again later");
      }
    
}
    
     
  // addCategory

  // editSellerCategoryPage
  public function sellerCategoryEdit ($id) 
  {
    $categoryData = SellerCategoryModel::where(
      [
        ['category_id',$id],
        ['category_admin',session('seller')]
      ])->first();

      if($categoryData!=""){
    $seller = SellerModel::find(session('seller'));
    $seller = SellerModel::find(session('seller'));
        return view('seller.dashboard.category.edit_category',['data'=>$categoryData,'seller'=>$seller]);
      }else{
        return redirect()->route('seller.viewCategoryPage');
      }
   
  }
  // editSellerCategoryPage

  // sellerDeleteCategory
  public function sellerDeleteCategory(Request $request)
  {
    $delete = SellerCategoryModel::where([
      ['category_id',$request->id],
      ['category_admin',session('seller')]
    ])->delete();
    if($delete){
      self::swal(true,'success','Successfull','Category Deleted Successfull');
    }else{
      self::swal(false,'error','Error','Category Not Deleted');
    }

  }

  // sellerDeleteCategory
  // updateCategory
   public function updateCategory(Request $request)
   {
     $category_name = $request->category_name;
      $category_photo = $request->category_photo;

      if($category_photo!=""){
          $imageName = time() . '.' . $category_photo->getClientOriginalExtension();
          $category_photo->move('category', $imageName);
      }else{
        $imageName = "";
      }
      $updateCategory = SellerCategoryModel::find($request->id);
      $updateCategory->category_name = $category_name;
      if($imageName!=""){
      $updateCategory->category_image = $imageName;
      }
      $update = $updateCategory->save();
        if($update){
          return self::toastr(false,true,"success", "Success","Category Updated Successfull");
        }else{
          return self::toastr(false,false,"error", "Error","Category Updated Failed");
        }
   }
  // updateCategory
     
 
}