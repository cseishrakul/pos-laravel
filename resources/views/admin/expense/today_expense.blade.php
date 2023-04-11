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
                            <a href="" class="btn btn-warning" style="text-decoration: none">Today Expense
                                {{ $daily_expense }} Tk</a>
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
                                    <h4 class="card-title">Today Expense</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Details
                                                    </th>
                                                    <th>Amount</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($today as $row)
                                                    <tr>
                                                        <td>{{ $row->details }}</td>
                                                        <td>{{ $row->amount }}</td>
                                                        <td>
                                                            <a href="{{ route('edit-today-expense', $row->id) }}"
                                                                class="btn btn-primary btn-sm"> <i
                                                                    class="fa fa-edit"></i></a>

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
@endsection
