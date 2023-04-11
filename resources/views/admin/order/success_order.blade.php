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
                            <a href="" class="text-dark" style="text-decoration: none">All
                                Success Order</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('pending.order') }}" class="" style="text-decoration: none">Pending Orders</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Success Order</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center" id="product">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Quantity</th>
                                                    <th>Total Amount</th>
                                                    <th>Payment</th>
                                                    <th>Order Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($success as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td>{{$row->order_date}}</td>
                                                        <td>{{$row->total_products}}</td>
                                                        <td>{{$row->total}}</td>
                                                        <td>{{$row->payment_status}}</td>
                                                        <td><span class="badge badge-primary">{{$row->order_status}}</span></td>
                                                        <td>
                                                            <a href="{{route('view-order-status',$row->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye" style="font-size:12px;"></i></a>
                                                            <a href="{{route('print-order',$row->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-print" style="font-size:12px;
                                                            "></i></a>
                                                            
                                                        </td>
                                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
             $('#product').DataTable();
      });
    </script>
@endsection
