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
                                Advance Salary To Employees</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('advance.salary') }}" class="" style="text-decoration: none">Add
                                Advance Salary</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Employees</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Photo
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Salary
                                                    </th>
                                                    <th>
                                                        Month
                                                    </th>
                                                    <th>
                                                        Advanced
                                                    </th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($salary as $row)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset($row->photo) }}" alt="{{ $row->photo }}"
                                                                class="" style="width: 60px; height:60px;">
                                                        </td>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->salary }}</td>
                                                        <td>{{ $row->month }}</td>
                                                        <td>{{ $row->advanced_salary }}</td>
                                                        <td>
                                                            <a href="{{ route('view-customer', $row->id) }}"
                                                                class="btn btn-primary btn-sm"> <i
                                                                    class="fa fa-eye"></i></a>
                                                            <a href="{{ route('edit-customer', $row->id) }}"
                                                                class="btn btn-primary btn-sm"> <i
                                                                    class="fa fa-edit"></i></a>
                                                            <a href="{{ route('delete-customer', $row->id) }}"
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
