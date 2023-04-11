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
                            <a href="{{ route('admin.dashboard') }}" class="text-dark" style="text-decoration: none">Add
                                Expense</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-dark"
                                style="text-decoration: none">Home</a> /
                            <a href="{{ route('add.employee') }}" class="" style="text-decoration: none">All
                                Expense</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card p=3">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Add Expense</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            <div class="my-3">
                                                <a href="{{route('today.expense')}}" class="btn btn-info btn-sm">Today Expense</a>
                                                <a href="{{route('monthly.expense')}}" class="btn btn-info btn-sm">This Month</a>
                                            </div>
                                        </div>
                                    </div>
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
                                            <form action="{{route('insert.expense')}}" class="" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Expense Details</label>
                                                            <textarea name="details" id="" cols="10" rows="2" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Amount</label>
                                                            <input type="text" name="amount" id=""
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="date" value="{{ date('d-m-y') }}">
                                                    <input type="hidden" name="month" value="{{ date('F') }}">
                                                    <input type="hidden" name="year" value="{{ date('Y') }}">
                                                </div>
                                                <input type="submit" value="Submit" class="btn btn-primary">
                                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
