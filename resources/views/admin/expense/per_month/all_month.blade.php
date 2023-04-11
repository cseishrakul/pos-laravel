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
                            @php
                                $month = date("F");
                                $monthly_expense = DB::table('expenses')->where('month',$month)->sum('amount');
                            @endphp
                            <a href="" class="btn btn-warning" style="text-decoration: none;font-size:16px;"><span class="badge badge-dark" style="font-size:19px">{{$month}}</span> Month Expense
                                <span class="badge badge-danger" style="font-size:19px">{{$monthly_expense}} Tk</span></a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('other.month.expense') }}" class="" style="text-decoration: none">Other Month
                                Expense</a>
                        </div>
                    </div>
                    <div class="mb-4">
                        <a href="{{route('january.expense')}}" class="btn btn-secondary btn-sm">January</a>
                        <a href="{{route('february.expense')}}" class="btn btn-dark btn-sm">February</a>
                        <a href="{{route('march.expense')}}" class="btn btn-warning btn-sm">March</a>
                        <a href="{{route('april.expense')}}" class="btn btn-danger btn-sm">April</a>
                        <a href="{{route('may.expense')}}" class="btn btn-success btn-sm">May</a>
                        <a href="{{route('june.expense')}}" class="btn btn-primary btn-sm">June</a>
                        <a href="{{route('july.expense')}}" class="btn btn-info btn-sm">July</a>
                        <a href="{{route('august.expense')}}" class="btn btn-dark btn-sm">August</a>
                        <a href="{{route('september.expense')}}" class="btn btn-warning btn-sm">September</a>
                        <a href="{{route('october.expense')}}" class="btn btn-danger btn-sm">October</a>
                        <a href="{{route('november.expense')}}" class="btn btn-success btn-sm">November</a>
                        <a href="{{route('december.expense')}}" class="btn btn-primary btn-sm">December</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Monthly Expense</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Details
                                                    </th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Month</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($expense as $row)
                                                    <tr>
                                                        <td>{{ $row->details }}</td>
                                                        <td>{{ $row->amount }}</td>
                                                        <td>{{ $row->date }}</td>
                                                        <td>{{ $row->month }}</td>
                                             
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
@endsection
