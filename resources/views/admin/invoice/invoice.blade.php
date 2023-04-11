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
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Invoice</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item active"><a
                                                    href="{{ route('admin.dashboard') }}">Invoice</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Main content -->
                                        <div class="invoice p-3 mb-3">
                                            <!-- title row -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>

                                                    </h4>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- info row -->
                                            <div class="row invoice-info my-3">
                                                <div class="col-sm-3 invoice-col">
                                                    From
                                                    <address>
                                                        <strong> <a class="navbar-brand brand-logo mr-5" href=""><img
                                                                    src="{{ asset('admin') }}/images/logo.svg"
                                                                    class="mr-2" style="width:120px;"
                                                                    alt="logo" /></a></strong><br>
                                                        {{ $setting->company_address }}<br>
                                                        Phone: {{ $setting->company_phone }}<br>
                                                        Email: {{ $setting->company_email }}
                                                    </address>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 invoice-col">
                                                    To
                                                    <address>
                                                        <strong>{{ $customer->name }}</strong><br>
                                                        Email: <strong>{{ $customer->email }}</strong> <br>
                                                        Phone: <strong>{{ $customer->phone }}</strong> <br>
                                                        Shop: <strong>{{ $customer->shopname }}</strong> <br>
                                                        Address: <strong>{{ $customer->address }}</strong>
                                                    </address>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-5 invoice-col">
                                                    <br>
                                                    <b>Order Date:</b> {{ date('ljs \of F Y') }} <br>
                                                    <b>Order Status:</b>
                                                    <div class="badge badge-danger">Pending</div> <br>
                                                    <b>Order ID:</b> 1 <br>

                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <!-- Table row -->
                                            <div class="row">
                                                <div class="col-12 table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Qty</th>
                                                                <th>Product Name</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Cost</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        @php
                                                            $sl = 1;
                                                        @endphp
                                                        <tbody>
                                                            @foreach ($contents as $cart)
                                                                <tr>
                                                                    <td>{{$sl++}}</td>
                                                                    <td>{{$cart->name}}</td>
                                                                    <td>{{$cart->qty}}</td>
                                                                    <td>{{$cart->price}}</td>
                                                                    <td>{{$cart->total * $cart->qty}}</td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <div class="row mt-3">
                                                <!-- accepted payments column -->
                                                <div class="col-6">
                                                    <p class="lead">Payment Methods:</p>
                                                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                                                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                                    <img src="../../dist/img/credit/american-express.png"
                                                        alt="American Express">
                                                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                                                    <p class="text-muted well well-sm shadow-none"
                                                        style="margin-top: 10px;">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem
                                                        plugg
                                                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                                    </p>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-6">
                                                    {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th style="width:50%">Subtotal:</th>
                                                                <td>{{Cart::subtotal()}} TK.</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tax</th>
                                                                <td>{{Cart::tax()}} TK.</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total:</th>
                                                                <td>{{Cart::total()}} TK. </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <!-- this row will not appear when printing -->
                                            <div class="row no-print mt-3">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-success float-right"
                                                    style="margin-right: 5px;"" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Submit
                                                </button>
                                                    <a href="{{ route('download-pdf') }}" class="btn btn-primary float-right"
                                                        style="margin-right: 5px;">
                                                        <i class="fas fa-download"></i> Generate PDF
                                            </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.invoice -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Invoice Of {{$customer->name}}</h5>
                    <h5 class="modal-title" id="exampleModalLabel">Total: {{Cart::total()}} Tk.</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('final.invoice') }}" class="forms-sample" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Payment </label>
                                    <select name="payment_status" class="form-control" id="">
                                        <option value="Handcash">HandCash</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Due">Due</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pay">Pay</label>
                                    <input type="text" class="form-control" id="pay" name="pay"
                                        placeholder="pay">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="due">Due</label>
                                    <input type="text" class="form-control" id="due" name="due"
                                        placeholder="Due">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                        <input type="hidden" name="order_date" value="{{date('d/m/y')}}">
                        <input type="hidden" name="order_status" value="pending">
                        <input type="hidden" name="total_products" value="{{Cart::count()}}">
                        <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
                        <input type="hidden" name="vat" value="{{Cart::tax()}}">
                        <input type="hidden" name="total" value="{{Cart::total()}}">


                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
