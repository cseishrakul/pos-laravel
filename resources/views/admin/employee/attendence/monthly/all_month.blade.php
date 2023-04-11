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
                           
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{route('monthly.attendence')}}" class="" style="text-decoration: none">Current Month
                                Expense</a>
                        </div>
                    </div>
                    <div class="mb-4">
                        <a href="{{route('january.attendence')}}" class="btn btn-secondary btn-sm">January</a>
                        <a href="{{route('february.attendence')}}" class="btn btn-dark btn-sm">February</a>
                        <a href="{{route('march.attendence')}}" class="btn btn-warning btn-sm">March</a>
                        <a href="{{route('april.attendence')}}" class="btn btn-danger btn-sm">April</a>
                        <a href="{{route('may.attendence')}}" class="btn btn-success btn-sm">May</a>
                        <a href="{{route('june.attendence')}}" class="btn btn-primary btn-sm">June</a>
                        <a href="{{route('july.attendence')}}" class="btn btn-info btn-sm">July</a>
                        <a href="{{route('august.attendence')}}" class="btn btn-dark btn-sm">August</a>
                        <a href="{{route('september.attendence')}}" class="btn btn-warning btn-sm">September</a>
                        <a href="{{route('october.attendence')}}" class="btn btn-danger btn-sm">October</a>
                        <a href="{{route('november.attendence')}}" class="btn btn-success btn-sm">November</a>
                        <a href="{{route('december.attendence')}}" class="btn btn-primary btn-sm">December</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            @php
                                $month = date("F");
                            @endphp
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{$month }} Month Attendence</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Attendence Date
                                                    </th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendence as $row)
                                                <tr>
                                                    <td>{{ $row->att_date }}</td>
                                                    <td><a href="{{ route('view.attendence', $row->edit_date) }}"
                                                        class="btn btn-info btn-sm"> <i
                                                            class="fa fa-eye"></i></a></td>
                                         
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
