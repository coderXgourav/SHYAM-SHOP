@section('title','Add-Category') 
@include('components.seller-header')



<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Category Form</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('seller.viewCategoryPage')}}"> <button type="button" class="btn btn-sm btn-primary">View
                            Category</button></a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <form id="formSubmit">
                    <input type="hidden" id="url" value="/seller/add-category">
                    <input type="hidden" id="dataType" value="POST">
                    <input type="hidden" name="_token" value="LcoydqmIVeeSsJm2SfgstfFVDOZO97lrPPt02Efn">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="my-4 text-center text-primary">Add New Category </h4>
                        </div>
                        <div class="card-body"> <br>
                            <input class="form-control" id="category_name" type="text"
                                placeholder="Type Category Name" required name="category_name" required> <br>

                            <div>
                                <input class="form-control" type="file" placeholder="Type Category Name" required
                                    name="category_photo" id="imageInput"> <br>
                                <div id="imagePreview"></div>
                            </div>
                        </div>
                        <br>

                        <div class="card-footer text-center"> <br>
                            <input type="submit" id="submitBtn" value="Add Category" class="btn btn-primary ">

                            <button class="btn btn-primary" type="button" disabled
                                                            id="loadingBtn" style="display:none ; width:136px;"> <span
                                                                class="spinner-border spinner-border-sm" role="status"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden" >Loading...</span>
                                                        </button>
                        </div>
                        <br>
                        


                    </div>
                </form>
            </div>
        </div>
        <!--end row-->
    </div>
</div>


<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<script>
    document.getElementById("imageInput").addEventListener("change", function(event) {
        const imagePreview = document.getElementById("imagePreview");
        imagePreview.innerHTML = ""; // Clear previous preview (if any)

        const selectedFile = event.target.files[0];

        if (selectedFile) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const imageUrl = event.target.result;
                const img = document.createElement("img");
                img.src = imageUrl;
                img.style.maxWidth = "100%";
                img.style.maxHeight = "200px"; // Set a maximum height for preview
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(selectedFile);
        }
    });
</script>

@include('components.seller-footer')
