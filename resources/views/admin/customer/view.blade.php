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
                            <a href="{{ route('admin.dashboard') }}" class="text-dark" style="text-decoration: none">View
                                Customer Details</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('all.customer') }}" class="" style="text-decoration: none">All
                                Customer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card p=3">
                                <div class="card-body">
                                    <h4 class="card-title">View Customer Details</h4>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <h4 class="">{{ $customer->name }}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <h4 class="">{{ $customer->email }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <h4 class="">{{ $customer->phone }}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <h4 class="">{{ $customer->address }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="shopname">Shop Name</label>
                                                        @if ($customer->shopname == null)
                                                            <h5 class="">None</h5>
                                                        @else
                                                            <h4 class="">{{ $customer->shopname }}</h4>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <h4 class="">{{ $customer->city }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="account_holder">Bank Account Holder</label>
                                                        <h4 class="">{{ $customer->account_holder }}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="account_number">Bank Account Number</label>
                                                        <h4 class="">{{ $customer->account_number }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bank_name">Bank Name</label>
                                                        <h4 class="">{{ $customer->bank_name }}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bank_branch">Bank Branch</label>
                                                        <h4 class="">{{ $customer->bank_branch }}</h4>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <img src="{{ asset($customer->photo) }}" style="width:150px; height:150px"
                                                    alt="" class="">
                                            </div>
                                        </div>
                                    </div>
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
