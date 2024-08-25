@section('title','Change Credential')
@include('components.seller-header')
<div class="page-wrapper">
    <div class="page-content">
<div class="card">
    <div class="card-body p-4">
        <h5 class="mb-4">Update Login Credential</h5>
        <form id="formSubmit">
            <input type="hidden" id="url" value="/seller/change-credential">
            <input type="hidden" id="dataType" value="POST">
            <div class="row mb-3">
                <label for="input37" class="col-sm-3 col-form-label">Email Address</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="input37" placeholder="Email Address" value="{{$seller->email}}" required />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input37" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="input37" placeholder="Type Username" value="{{$seller->username}}" required />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input38" class="col-sm-3 col-form-label"> Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Choose Password" id="password" value="{{$password}}" required />
                </div>
                @csrf
            </div>
            <div class="row mb-3">
                <label for="input38" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" id="input38" placeholder="Confirm Password" value="{{$password}}"   required />
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4" id="submitBtn">Submit</button>
                        <button class="btn btn-primary" type="button" disabled
                        id="loadingBtn" style="display: none; width:110px;"> <span
                            class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true" ></span>
                        <span class="visually-hidden">Loading...</span>
                    </button>
                        <button type="reset" class="btn btn-light px-4">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

@include('components.seller-footer')