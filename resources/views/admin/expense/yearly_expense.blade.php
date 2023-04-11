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
                            <a href="" class="btn btn-warning" style="text-decoration: none;font-size:16px;"><span class="badge badge-dark" style="font-size:19px">{{$year}}</span>  Expense
                                <span class="badge badge-danger" style="font-size:19px">{{ $yearly_expense }} Tk</span></a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('add.expense') }}" class="" style="text-decoration: none">Add
                                Expense</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Yearly Expense</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Details
                                                    </th>
                                                    <th>Amount</th>
                                                    <th>Month</th>
                                                    <th>Year</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($expense as $row)
                                                    <tr>
                                                        <td>{{ $row->details }}</td>
                                                        <td>{{ $row->amount }}</td>
                                                        <td>{{ $row->month }}</td>
                                                        <td>{{ $row->year }}</td>
                                             
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
