<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/syndron/demo/vertical/auth-basic-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Aug 2023 06:57:39 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ url('/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ url('/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ url('/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ url('/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ url('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ url('/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Shyam shop admin </title>
</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img src="{{ url('/assets/logo.png') }}" width="150px"
                                            alt="" />
                                            <hr>
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class=""> Admin Login</h5>
                                        <p class="mb-0">Please log in to your account</p>
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" id="formSubmit">
                                            <input type="hidden" id="url" value="/admin/login">
                                            <input type="hidden" id="dataType" value="POST">
                                            <div class="col-12">
                                                @csrf
                                                <label for="inputEmailAddress" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="inputEmailAddress"
                                                    placeholder="jhon@example.com" name="email" required> 
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="inputChoosePassword" value=""
                                                        placeholder="Enter Password" name="password" required minlength="4">  <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> <a
                                                    href="#">Forgot Password ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                <button class="btn btn-primary" type="button" disabled
                                                id="loadingBtn" style="display: none;"> <span
                                                    class="spinner-border spinner-border-sm " role="status"
                                                    aria-hidden="true"></span>
                                                <span class="visually-hidden">Loading...</span>
                                            </button>
                                                
                                                    <button type="submit" id="submitBtn" class="btn btn-primary">Sign in</button>
                                                </div>
                                            </div>
                                           
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ url('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ url('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('/assets/js/formValidation.js') }}"></script>
    <script src="{{ url('/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{url('/projectJs/alert_show.js')}}"></script>
    <script src="{{url('/projectJs/admin/login.js')}}"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ url('/assets/js/app.js') }}"></script>

</body>


</html>
