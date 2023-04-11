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
                        <div class="col-md-7">
                           
                        </div>
                        <div class="col-md-5">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{route('other-month-attendence')}}" class="" style="text-decoration: none">Other's Month
                                Attendence</a>
                        </div>
                    </div>
                    <h2 class="">Current Year {{$year}}</h2>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Yearly Attendence</h4>
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
