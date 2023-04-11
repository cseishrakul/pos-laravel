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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-info p-3 text-light">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="">POS(Point Of Sale)</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class=""><a href="" class="text-light">POS / </a>
                                            <a href="" class="text-light">{{ date('d-m-y') }}</a>
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        @foreach ($category as $row)
                            <a href="" class="btn btn-info btn-sm">{{ $row->cat_name }}</a>
                        @endforeach

                    </div>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <div class="card text-center" style="">

                                <ul class="list-group list-group-flush">
                                    <table class="table">
                                        <thead class="bg-primary text-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Sub Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $cart = Cart::content();
                                        @endphp
                                        <tbody>
                                            @foreach ($cart as $cart)
                                                <tr>
                                                    <td>{{ $cart->name }}</td>
                                                    <td>
                                                        <form action="{{ route('cart.update', $cart->rowId) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="number" name="qty" id=""
                                                                value="{{ $cart->qty }}" style="width:30px;border:none">
                                                            <button type="submit" class="btn btn-sm btn-primary"
                                                                style="margin-top:-2px"> <i class="fa fa-check"></i>
                                                            </button>
                                                        </form>

                                                    </td>
                                                    <td>{{ $cart->price }}</td>
                                                    <td>
                                                        {{ $cart->price * $cart->qty }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('cart.remove', $cart->rowId) }}" class="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </ul>
                                <div class="card-footer bg-primary text-light mt-3">
                                    <p class="">Quantity: {{ Cart::count() }}</p>
                                    <p class="">Sub Total: {{ Cart::subtotal() }} Tk.</p>
                                    <p class="">Vat: {{ Cart::tax() }}</p>
                                    <hr>
                                    <h3 class="">Total: {{ Cart::total() }} Tk</h3>
                                </div>
                                <form action="{{ route('create.invoice') }}" method="POST" class="mt-4">
                                    @csrf
                                    <div class="">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <h4 class="">Customer</h4>

                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Add New
                                                </a>
                                            </div>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>  
                                        @endif
                                        <select name="cus_id" id="" class="form-control">
                                            <option disabled selected>Select Customer</option>
                                            @foreach ($customer as $cus)
                                                <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <input type="hidden" name="customer_id" value="{{ $cus->id }}">
                                    <button type="submit" class="btn btn-danger my-2">Create Invoice</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Product Code</th>
                                        <th>Add</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $row)
                                        <tr>
                                            <form action="{{ route('add.cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <input type="hidden" name="name" value="{{ $row->product_name }}">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price" value="{{ $row->selling_price }}">
                                                <td>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <img src="{{ asset($row->product_image) }}" alt=""
                                                                class="" style="height:60px;width:60px">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $row->product_name }}</td>
                                                <td>{{ $row->cat_name }}</td>
                                                <td>{{ $row->product_code }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                                            class="fa fa-cart-shopping"></i></button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

    {{-- Add Customer Modal --}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('insert.customer') }}" class="forms-sample" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Customer Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Username" required>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shopname">Shop Name</label>
                                    <input type="text" class="form-control" id="shopname" name="shopname"
                                        placeholder="Shop Name">
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                    <input type="text" class="form-control" id="account_holder" name="account_holder"
                                        placeholder="Bank Account Holder">
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
                                <input type="file" class="form-control upload mb-2" id="photo" name="photo"
                                    accept="image/*" onchange="readURL(this);">
                                <img src="#" alt="" id="image" required>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>

            </div>
        </div>
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
