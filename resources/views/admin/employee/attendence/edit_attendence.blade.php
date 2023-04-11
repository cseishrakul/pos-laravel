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
                            <a href="" class="text-dark" style="text-decoration: none">Update Attendence</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('all.employee') }}" class="" style="text-decoration: none">All
                                Attendence</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Attendence ({{ $date->att_date }})</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Photo
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>Attendence</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form action="{{ route('update-attendence') }}" class=""
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @foreach ($attendence as $row)
                                                        <tr>
                                                            <td>
                                                                <img src="{{ asset($row->photo) }}"
                                                                    alt="{{ $row->photo }}" class="mx-auto"
                                                                    style="width: 60px; height:60px;">
                                                                <input type="hidden" name="id[]"
                                                                    value="{{ $row->id }}">
                                                            </td>
                                                            <td>{{ $row->name }}</td>
                                                            <td>
                                                                <input type="radio" name="attendence[{{ $row->id }}]"
                                                                    id="" value="Present" class="" required
                                                                    <?php if ($row->attendence == 'Present') {
                                                                        echo 'checked';
                                                                    } ?>> Present

                                                                <input type="radio" name="attendence[{{ $row->id }}]"
                                                                    id="" value="Absence" class="" required
                                                                    <?php if ($row->attendence == 'Absence') {
                                                                        echo 'checked';
                                                                    } ?>> Absense
                                                            </td>
                                                            <input type="hidden" name="att_date"
                                                                value="{{ date('d-m-y') }}">

                                                            <input type="hidden" name="att_year"
                                                                value="{{ date('Y') }}">
                                                            <input type="hidden" name="month"
                                                                value="{{ date('F') }}">

                                                        </tr>
                                                    @endforeach
                                            </tbody>

                                        </table>
                                        <input type="submit" value="Update Attendence" class="btn btn-info my-4">
                                        </form>
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
