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
                            <a href="{{ route('import.product') }}" class="btn btn-info" style="text-decoration: none">Import
                                Product</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('all.product') }}" class="" style="text-decoration: none">All
                                Product</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card p=3">
                                <div class="card-body">
                                    <h4 class="card-title">Add Product</h4>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('insert.product') }}" class="forms-sample" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="product_name">Product Name</label>
                                                    <input type="text" class="form-control" id="product_name"
                                                        name="product_name" placeholder="Username" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="product_code">Product Code</label>
                                                    <input type="text" class="form-control" id="product_code"
                                                        name="product_code" placeholder="Product Code" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cat_id">Category</label>
                                                    <select name="cat_id" id="cat_id" class="form-control">
                                                        @foreach ($category as $row)
                                                            <option value="{{$row->id}}">{{ $row->cat_name }}</option>
                                                        @endforeach
                                                        `
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sup_id">Supplier</label>
                                                    <select name="sup_id" id="sup_id" class="form-control">
                                                        ` @foreach ($supplier as $row)
                                                            <option value="{{$row->id}}">{{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="product_garage">Warehouse</label>
                                                    <input type="text" class="form-control" id="product_garage"
                                                        name="product_garage" placeholder="Warehouse">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="product_route">Product Route</label>
                                                    <input type="text" class="form-control" id="product_route"
                                                        name="product_route" placeholder="Product Route">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="buy_date">Product Buy Date </label>
                                                    <input type="date" class="form-control" id="buy_date"
                                                        name="buy_date" placeholder="Product Buy Date ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="expire_date">Product Expire Date</label>
                                                    <input type="date" class="form-control" id="expire_date"
                                                        name="expire_date" placeholder="Product Expire Date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="buying_price">Product Buying Price</label>
                                                    <input type="text" class="form-control" id="buying_price"
                                                        name="buying_price" placeholder="Product Buying Price">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="selling_price">Product Selling Price</label>
                                                    <input type="text" class="form-control" id="selling_price"
                                                        name="selling_price" placeholder="Product Selling Price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <input type="file" class="form-control upload mb-2" id="photo"
                                                    name="product_image" accept="image/*" onchange="readURL(this);">
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
