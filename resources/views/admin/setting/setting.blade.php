@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('admin.partial.navbar')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('admin.partial.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row mb-4">
                        <div class="col-md-9">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark" style="text-decoration: none">Company Setting</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('all.employee') }}" class="" style="text-decoration: none">All
                                Employee</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card p=3">
                                <div class="card-body">
                                    <h4 class="card-title">Company Setting</h4>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                        
                                    @endif
                                    <form action="{{route("update.setting",$setting->id)}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Company Name</label>
                                                    <input type="text" class="form-control" id="name" name="company_name"
                                                        placeholder="Username" required value="{{$setting->company_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="company_email"
                                                        placeholder="abc@mail.com" required value="{{$setting->company_email}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="number" class="form-control" id="phone" name="company_phone"
                                                        placeholder="Phone Number" required value="{{$setting->company_phone}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="company_address"
                                                        placeholder="Address" required value="{{$setting->company_address}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="experience">Company Mobile</label>
                                                    <input type="text" class="form-control" id="company_mobile"
                                                        name="company_mobile" placeholder="Company Mobile" required value="{{$setting->company_mobile}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="salary">Company City</label>
                                                    <input type="text" class="form-control" id="Company_city" name="company_city"
                                                        placeholder="Company City" required value="{{$setting->company_city}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="vacation">Company Country</label>
                                                    <input type="text" class="form-control" id="company_country"
                                                        name="company_country" placeholder="Country" required value="{{$setting->company_country}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">Zipcode</label>
                                                    <input type="text" class="form-control" id="company_zipcode" name="company_zipcode"
                                                        placeholder="Zipcode" required value="{{$setting->company_zipcode}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="photo">New Photo</label>
                                                    <input type="file" class="form-control upload mb-2" id="photo"
                                                        name="company_logo" accept="image/*" onchange="readURL(this);">
                                                        <img src="#" alt="" id="image" required>
                                                </div>
                                                <div class="form-group">
                                                    <img src="{{asset($setting->company_logo)}}" alt="" style="width: 80px; height:80px;" name="" class="">
                                                    <label for="">Old Photo</label>
                                                    <input type="hidden" name="old_photo" value="{{$setting->company_logo}}">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.partial.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var render = new FileReader();
                render.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                render.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
