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
                            <a href="{{ route('admin.dashboard') }}" class="text-dark" style="text-decoration: none">Add
                                Suppiler</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('add.customer') }}" class="" style="text-decoration: none">Add
                                Supplier</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card p=3">
                                <div class="card-body">
                                    <h4 class="card-title">Add Supplier</h4>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                        
                                    @endif
                                    <form action="{{route('insert.supplier')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Supplier Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Supplier Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="abc@mail.com" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="number" class="form-control" id="phone" name="phone"
                                                        placeholder="Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        placeholder="Address" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="type">Type</label>
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="1">Distributor</option>
                                                        <option value="2">Whole Seller</option>
                                                        <option value="3">Brochure</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="type">Shop</label>
                                                    <input type="text" class="form-control" name="shop" placeholder="Shop">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" id="city" name="city"
                                                        placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account_holder">Bank Account Holder</label>
                                                    <input type="text" class="form-control" id="account_holder"
                                                        name="account_holder" placeholder="Bank Account Holder">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account_number">Bank Account Number</label>
                                                    <input type="text" class="form-control" id="account_number" name="account_number"
                                                        placeholder="Bank Account Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank_name">Bank Name</label>
                                                    <input type="text" class="form-control" id="bank_name" name="bank_name"
                                                        placeholder="Bank Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank_branch">Bank Branch</label>
                                                    <input type="text" class="form-control" id="bank_branch" name="bank_branch"
                                                        placeholder="Bank Branch">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <input type="file" class="form-control upload mb-2" id="photo"
                                                    name="photo" accept="image/*" onchange="readURL(this);">
                                                    <img src="#" alt="" id="image" required>
                                            </div>
                                        </div>
                                        <input type="submit" value="Submit" class="btn btn-primary">
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
