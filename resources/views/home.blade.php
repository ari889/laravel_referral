@extends('layouts.app')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Welcome to CPM</h4>

{{--                        <div class="page-title-right">--}}
{{--                            <ol class="breadcrumb m-0">--}}
{{--                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>--}}
{{--                                <li class="breadcrumb-item active">Responsive Table</li>--}}
{{--                            </ol>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">Currently you have following package</h4>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th data-priority="1">Selected Package</th>
                                            <th data-priority="2">Price</th>
                                            <th data-priority="3">Circle Days</th>
                                            <th data-priority="4">Remaining Days</th>
                                            <th data-priority="4">Refered By</th>
                                            <th data-priority="5">Join at</th>
                                            <th data-priority="6">Pool Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user_data as $data)
                                        <tr>
                                            <td>{{$data -> first_name}} {{$data -> last_name}}</td>
                                            <td>{{ucfirst($data -> package_name)}}</td>
                                            <td>{{$data -> price}}</td>
                                            <td>{{$data -> circle_days}} Days</td>
                                            <td>45 Days</td>
                                            <td>Marrie Doe</td>
                                            <td>{{$data -> created_at}}</td>
                                            <td>{{ucfirst($data -> status)}}</td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
