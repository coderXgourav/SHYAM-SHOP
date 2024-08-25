@section('title','View Products')
@include('components.seller-header')
<div class="page-wrapper">
    <div class="page-content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-2">
                                <a href="{{route('seller.addProductPage')}}" class="btn btn-primary btn-sm mb-lg-0"><i class='bx bxs-plus-square'></i>New Product</a>
                            </div>
                           
                            <div class="col-lg-9 col-xl-10">
                                <form action="{{route('seller.filterProduct')}}" method="GET" style="display: flex; ">
                                    <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                            <div class="col ">
                                                <select name="category" id="" class="form-control" style="width:200px;" required>
                                                   <option value="">Filter Category</option>
                                                 @foreach ($category as $item)
                                                     <option value="{{$item->category_id}}" @if ($item->category_id==request('category')) selected
                                                         
                                                     @endif>{{$item->category_name}}</option>
                                                 @endforeach
                                                </select>
                                           </div>
                                        {{-- <div class="col">
                                            <div class="position-relative">
                                                <input type="text" class="form-control ps-5" placeholder="Search Product..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                            </div>
                                        </div> --}}
                                        
                                        <div class="col">
                                            <select name="price" id="" class="form-control" style="width:200px;">
                                                <option value="">Price range</option>
                                                <option value="low to high">Low to high</option>
                                                <option value="High to low">High to low</option>
                                             </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mx-3">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
            @if (count($products)>0)
            @foreach ($products as $item)
            <?php $imageName = json_decode($item->images); ?>
            <div class="col">
                <div class="card">
                    <img src="/products/{{$imageName['0']}}" class="card-img-top" alt="..." style="widows: 230px; height:200px;">
                   
                    <div class="card-body">
                        <h6 class="card-title cursor-pointer">{{$item->title}}</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start"><strong>{{$item->quantity}}</strong> Quantity</p>
                            <p class="mb-0 float-end fw-bold"><span>${{$item->price}}</span></p>
                        </div>
                        <div class="d-flex  mt-3 fs-6 gap-2 justify-content-conter">
                       <a href="{{route('seller.editProduct',['id'=>$item->productId])}}"> <button class="btn btn-primary btn-sm">Edit</button></a>
                         <button class="btn btn-danger btn-sm" onclick="confirmfunction({{$item->productId}},'/seller/delete-product')">Delete</button>
                        </div>
                    </div>
                </div>
                
                
            </div>
            @endforeach
            @else 
            <div class="col-md-12" style="text-align:center; align-items:center; margin:auto; width:50%;"> <br> <br>
                <div class="p-4 rounded " style="background: rgba(255, 0, 0, 0.623);"><br>
                    <h6 class="text-light">Empty Products </h6>
                    <br>
                </div>
            </div>
            @endif
            
         
        </div><!--end row-->


    </div>
</div>
@include('components.seller-footer')
