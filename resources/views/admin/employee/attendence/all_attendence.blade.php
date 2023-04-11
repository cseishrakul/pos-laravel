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
                                Attendence</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('take.attendence') }}" class="" style="text-decoration: none">Take Attendence</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Attendence</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        SL
                                                    </th>
                                                    <th>
                                                        Attendence Date
                                                    </th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sl = 1;
                                                @endphp
                                                @foreach ($all_att as $row)
                                                    <tr>
                                                       <td>{{$sl++}}</td>
                                                       <td>{{$row->edit_date}}</td>
                                                       <td>
                                                        <a href="{{ route('edit-attendence', $row->edit_date) }}"
                                                            class="btn btn-primary btn-sm"> <i
                                                                class="fa fa-edit"></i></a>
                                                        <a href="{{ route('view.attendence', $row->edit_date) }}"
                                                            class="btn btn-info btn-sm"> <i
                                                                class="fa fa-eye"></i></a>
                                                        <a href="{{ route('delete.category', $row->edit_date) }}"
                                                            class="btn btn-danger btn-sm" id="delete"> <i
                                                                class="fa fa-trash"></i></a>
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
