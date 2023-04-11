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
                                        <h1>Order Confirmation</h1>
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
                                                        <strong>{{ $order->name }}</strong><br>
                                                        Email: <strong>{{ $order->email }}</strong> <br>
                                                        Phone: <strong>{{ $order->phone }}</strong> <br>
                                                        Shop: <strong>{{ $order->shopname }}</strong> <br>
                                                        Address: <strong>{{ $order->address }}</strong>
                                                    </address>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-5 invoice-col">
                                                    <br>
                                                    <b>Order Date:</b> {{ $order->order_date }} <br>
                                                    <b>Order Status:</b>
                                                    <div class="badge badge-primary">{{$order->order_status}}</div> <br>
                                                    <b>Order ID:</b> {{ $order->id }} <br>

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
                                                                <th>Product Code</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Cost</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        @php
                                                            $sl = 1;
                                                        @endphp
                                                        <tbody>
                                                            @foreach ($order_details as $cart)
                                                                <tr>
                                                                    <td>{{ $sl++ }}</td>
                                                                    <td>{{ $cart->product_name }}</td>
                                                                    <td>{{ $cart->product_code }}</td>
                                                                    <td>{{ $cart->quantity }}</td>
                                                                    <td>{{ $cart->unitcost }}</td>
                                                                    <td>{{ $cart->total }}</td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <div class="row mt-5">
                                                <!-- accepted payments column -->
                                                <div class="col-6">
                                                    <h4 class="">Payment By: <b>{{ $order->payment_status }}</b></h4>
                                                    <h4 class="">Pay: <b>{{ $order->pay }}</b></h4>
                                                    <h4 class="">Due: <b>{{ $order->due }}</b></h4>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-6">
                                                    {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th style="width:50%">Subtotal:</th>
                                                                <td>{{ $order->sub_total }} TK.</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tax</th>
                                                                <td>{{ $order->vat }} TK.</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total:</th>
                                                                <td>{{ $order->total }} TK. </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <!-- this row will not appear when printing -->
                                            @if ($order->order_status == 'success')
                                                
                                            @else
                                            <div class="row no-print mt-3">
                                                <div class="col-12">
                                                    <a href="{{route('pos-done',$order->id)}}" class="btn btn-success float-right"
                                                        style="margin-right: 5px;"">
                                                        Done
                                                    </a>

                                                </div>
                                            </div>
                                            @endif
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
@endsection
