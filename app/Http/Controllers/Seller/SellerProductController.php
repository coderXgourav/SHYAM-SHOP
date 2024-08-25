<?php 

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use App\Models\SellerModel;
use Illuminate\Http\Request;
use App\Models\SellerCategoryModel;    
use App\Models\ProductModel;


class SellerProductController extends Controller
 {

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

    public function addProductPage()
    {
        $data = SellerModel::find(session('seller'));
        $sellerCategory = SellerCategoryModel::where('category_admin',$data->sellerId)->orderBy('category_id','DESC')->get();
        foreach($sellerCategory as $cateData => $val){

            $categoryData[] = [
                'categoryName' => $val['category_name'],
                'categoryId' => $val['category_id']
            ];
        }

       return view('seller.dashboard.product.addProduct',['seller'=>$data ,'sellerCategory'=>$categoryData]);
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

    // image check 
    public function imageCheck($image,$folderPath)
    {
        $imgExt = $image->getClientOriginalExtension(); 

        if($imgExt=="png"||$imgExt=="jpg"||$imgExt=="jpeg"||$imgExt=="webp"){
            $imageName = rand(11111,989999).'.'.$imgExt;
            $image->move($folderPath, $imageName);
            return array('status'=>true,'msg'=>"Image uploaded succefull",'imageName'=>$imageName);
      }else{
        return array('status'=>false,'msg'=>"Choose Image only",'imageName'=>"");
      }
    }

    // image check 


    // productUpload
    public function productUpload(Request $request)
    {
        $productSave = new ProductModel;
        $productSave->title = $request->title;
        $productSave->description = $request->mytextarea;
        $productSave->price = $request->price;
        $productSave->quantity = $request->quantity;
        $productSave->product_category_id = $request->category;
        $productSave->product_admin = session('seller');

        $images = $request->image;

        $path = "products";

        foreach ($images as $key => $value) {
           $data = self::imageCheck($value,$path);
            $checkStatus[] = $data['status'];
            $imgNames[] = $data['imageName'];
        }

        if(in_array(false,$checkStatus)){
            return self::toastr(false,false,"error", "Error","Choose Image only , please try again later");
        }else{
            $productSave->images = json_encode($imgNames);
            $productSave->save();
            return self::toastr(false,true,"success", "Success","Product Uploaded Successfull");
        }

    
    }
    // productUpload


    // viewProduct
    public function viewProduct(Request $request)
    {
        $seller = SellerModel::find(session('seller'));
        $sellerProducts =  ProductModel::where('product_admin',session('seller'))->orderBy('productId','DESC')->get();
        $sellerCategory = SellerCategoryModel::where('category_admin',session('seller'))->orderBy('category_id','DESC')->get();

        return view('seller.dashboard.product.viewProduct',['seller'=>$seller,'products'=>$sellerProducts,'category'=>$sellerCategory]);
 
    }
    // viewProduct
    // deleteProduct
    public function deleteProduct(Request $request)
    {
        $delete = ProductModel::find($request->id)->delete();
        if($delete){
            self::swal(true,'success','Successfull','Product Deleted Successfull');
          }else{
            self::swal(false,'error','Error','Product Not Deleted');
          }
    }
    // deleteProduct

    // userEditPage
    public function userEditPage($id)
    {
        $seller = SellerModel::find(session('seller'));
        
        $product = ProductModel::where([
            ['productId',$id],
            ['product_admin',session('seller')]
        ])->first();

        $sellerCategory = SellerCategoryModel::where('category_admin',session('seller'))->orderBy('category_id','DESC')->get();
        foreach($sellerCategory as $cateData => $val){
            $categoryData[] = [
                'categoryName' => $val['category_name'],
                'categoryId' => $val['category_id']
            ];
        }
      
        return view('seller.dashboard.product.editProduct',['seller'=>$seller,'product'=>$product,'sellerCategory'=>$categoryData]);
    // userEditPage

  }


//   productFilter 
public function productFilter(Request $request)
{
    $id = $request->category;
     $price = $request->price;

     if($price==""){
        $products = ProductModel::where('product_admin',session('seller'))->where('product_category_id',$id)->get();
     }else if($price=="low to high"){
        $products = ProductModel::where('product_admin',session('seller'))->where('product_category_id',$id)->orderBy('price','ASC')->get();
     }else{
        $products = ProductModel::where('product_admin',session('seller'))->where('product_category_id',$id)->orderBy('price','DESC')->get();
     }

     $sellerCategory = SellerCategoryModel::where('category_admin',session('seller'))->get();

    $seller = SellerModel::find(session('seller'));
  return view('seller.dashboard.product.viewProduct',['seller'=>$seller,'products'=>$products,'category'=>$sellerCategory]);
   

}
//   productFilter 

// updateProduct
  public function updateProduct(Request $request)
  {
   if($request->image!=""){
   
      $images = $request->image;
      $path = "products";
        foreach ($images as $key => $value) {
        $data = self::imageCheck($value,$path);
            $checkStatus[] = $data['status'];
            $imgNames[] = $data['imageName'];
            $image=1;
        }
       
   }else{
   
    $image = 0;
   }

   $productUpdate = ProductModel::find($request->product_id);
    $productUpdate->title = $request->title;
    $productUpdate->description = $request->mytextarea;
    $productUpdate->price = $request->price;
    $productUpdate->quantity = $request->quantity;
    $productUpdate->product_category_id = $request->category;

if($image != 0){
  
  if(in_array(false,$checkStatus)){
    return self::toastr(false,false,"error", "Error","Choose Image only , please try again later");
      }else{
       $imgJsonNames = json_encode($imgNames);
       $productUpdate->images=$imgJsonNames;
       $productUpdate->save();
   return self::toastr(false,true,"success", "Success","Product Updated Successfull");
    }   
    }else{
        // echo "0";
        // die();
        $productUpdate->save();
        return self::toastr(false,true,"success", "Success","Product Updated Successfull");
   }

 


  }
// updateProduct

//   END OF CLASS 


 }

