@section('title','Edit-Product')
@include('components.seller-header')
{{-- <link href="{{url('assets/plugins/input-tags/css/tagsinput.css ')}}" rel="stylesheet" /> --}}
<style>
    .ql-editor{
        height:220px !important;
	}
	#imageContainer {
  display: flex;
  flex-wrap: wrap;
}

#imageContainer img {
  max-width: 120px;
  margin: 10px;
}

</style>
{{-- <link href="{{url('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" /> --}}
{{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Product</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('seller.viewProduct')}}">
								<button type="button" class="btn-sm btn btn-primary">View Products</button>
							</a>
							
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<form action="" id="formSubmit">

					<input type="hidden" id="url" value="/seller/update-product">
					<input type="hidden" id="dataType" value="POST">

					<div class="card">
						<div class="card-body p-4">
							<h5 class="card-title"> Product Edit Form</h5>
							<hr/>
							 <div class="form-body mt-4">
							  <div class="row">
								 <div class="col-lg-8">
								 <div class="border border-3 p-4 rounded">
								  <div class="mb-3">
									  <label for="inputProductTitle" class="form-label">Product Title</label>
									  <input type="text" value="{{$product->title}}" class="form-control" id="inputProductTitle" placeholder="Enter product title" name="title" required>
									</div>
									<input type="hidden" name="product_id" value="{{$product->productId}}">
							  
									<div class="mb-3">
									  <label for="">Description</label>
									<div >
										<textarea id="mytextarea"  value="" name="mytextarea" placeholder="Type product description" required>{!! $product->description !!}</textarea>
									</div>
								  </div>
									{{-- <div class="mb-3">
									  <label for="inputProductDescription" class="form-label">Product Images</label>
									  <input id="image-uploadify" type="file" accept="image/jpeg, image/png, image/webp" name="image[]" multiple required>
									</div> --}}
									<label for="" >Choose Product images  <span class="text text-primary text-sm">( Select up to 4 Images )</span> </label>
									<div class="mb-3 border border-3  rounded p-4" >
										<input type="file" id="imageInput" multiple accept="image/*" name="image[]" >
									</div>
									@csrf
									<div id="imageContainer">
										@php
											$image = json_decode($product->images);
											@endphp
										@foreach ($image as $key => $value) 
										<img src="/products/{{$value}}" alt="image" style="border-radius: 10px;">
										@endforeach
									</div>
								  </div>
								 </div>
								 <div class="col-lg-4">
								  <div class="border border-3 p-4 rounded">
									<div class="row g-3">
									  
										<div class="col-md-6">
										  <label for="inputCostPerPrice" class="form-label">Price</label>
										  <input type="number" class="form-control" id="inputCostPerPrice" placeholder="00.00" name="price" value="{{$product->price}}" required>
										</div>
										<div class="col-md-6">
										  <label for="inputStarPoints" class="form-label">Quantity</label>
										  <input type="number" class="form-control" id="inputStarPoints" placeholder="Quantity of products in stock " name="quantity" value="{{$product->quantity}}" required>
										</div>
										<div class="col-12">
										  <label for="inputProductType" class="form-label">Product Type</label>
										  <select class="form-select" id="inputProductType" required name="category">
											<option value="">Select Product type</option>
											  @for($i=0; $i < count($sellerCategory); $i++)
											  <option value="{{$sellerCategory[$i]['categoryId']}}" @if ($sellerCategory[$i]['categoryId']==$product->product_category_id)selected
                                                  
                                              @endif>{{$sellerCategory[$i]['categoryName']}}</option>
											  @endfor
											</select>
										</div>
										{{-- <div class="col-12">
										 	<div class="mb-3">
										<label class="form-label">Product Tags</label>
										<select multiple data-role="tagsinput" name="tags[]" >
											<option value="tag">tag</option>
											
										</select>[]
									</div>
										</div> --}}
										<div class="col-12">
											<div class="d-grid mt-3">
											   <button type="submit" class="btn btn-primary" id="submitBtn">Update Product</button>
											   <button class="btn btn-primary" type="button" disabled
											   id="loadingBtn" style="display:none ; width:100% ;"> <span
												   class="spinner-border spinner-border-sm" role="status"
												   aria-hidden="true"></span>
											   <span class="visually-hidden" >Loading...</span>
										   </button>
											</div>
										</div>
									</div> 
								</div>
								</div>
							 </div><!--end row-->
						  </div>
						</div>
					</div>
				</form>


			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
        @include('components.seller-footer')
        <!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="{{url('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{url('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{url('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
	<script src="{{url('assets/js/editor.js')}}"></script>
	{{-- <script src="{{url('assets/plugins/input-tags/js/tagsinput.js')}}"></script> --}}
	<script>
		 tinymce.init({
  selector: 'textarea#mytextarea',
  api_key: '2o9r5iwikkhmjkctjhysshr3mq6l03v03q5siuzq63ppwf4n',
});
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		});
	</script>
	<!--app JS-->
	<script src="{{url('assets/js/app.js')}}"></script>
<script>
	const imageInput = document.getElementById('imageInput');
const imageContainer = document.getElementById('imageContainer');

imageInput.addEventListener('change', function() {
  imageContainer.innerHTML = ''; // Clear previous images

  const files = this.files;
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    if (!file.type.startsWith('image/')) continue; // Skip non-image files

    const reader = new FileReader();
    reader.onload = function() {
      const img = document.createElement('img');
      img.src = reader.result;
      imageContainer.appendChild(img);
    }
    reader.readAsDataURL(file);
  }
});
</script>