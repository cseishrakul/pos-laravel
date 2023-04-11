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
                            <a href="{{ route('admin.dashboard') }}" class="text-dark" style="text-decoration: none">
                                Admin Dashboard</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('export') }}" class="" style="text-decoration: none">Download Xlsx</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="card p=3">
                                <div class="card-body">
                                    <h4 class="card-title text-center"> Product Import</h4>
                                    <hr>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-5 mx-auto">
                                            <form action="{{route('import')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Xlsx File Import</label>
                                                    <input type="file" name="import_file" >
                                                </div>
                                                <input type="submit" value="Upload" class="btn btn-primary">
                                            </form>
                                        </div>
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
