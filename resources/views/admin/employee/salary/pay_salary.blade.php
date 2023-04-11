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
                            <a href="" class="text-dark" style="text-decoration: none">Salary To Employees</a>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                    <h4 class="card-title">Pay Salary</h4>
                                        </div>
                                        <div class="col-md-6 mx-auto">
                                            <span class="pull-right">{{ date('F Y') }}</span>
                                        </div>
                                    </div>
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
                                                    {{-- <th>
                                                        Advanced
                                                    </th> --}}
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employee as $row)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset($row->photo) }}" alt="{{ $row->photo }}"
                                                                class="" style="width: 60px; height:60px;">
                                                        </td>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->salary }}</td>
                                                        <td>
                                                            <span class="badge badge-success">{{date("F",strtotime('-1 months'))}}</span>
                                                        </td>
                                                        {{-- <td>{{ $row->advanced_salary }}</td> --}}
                                                        <td>
                                                            <a href=""
                                                                class="btn btn-primary btn-sm"> <i
                                                                    class="fa fa-money"></i> Pay Now</a>
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
