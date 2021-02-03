@extends('layouts.app')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">

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
                        <div class="card-header">
                            <h3>Your referral is</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Referral link" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{route('packages', Auth::user() -> id)}}" id="copy-text">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success" id="copy-link">Copy</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-borderless text-center">
                            <thead>
                            <tr>
                                <th scope="col">Visit</th>
                                <th scope="col">Registration</th>
                                <th scope="col">Conversion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><h3>{{$user_data -> visit}}</h3></td>
                                <td><h3>{{$user_data -> registered}}</h3></td>
                                <td><h3>
                                        @if($user_data -> visit !== 0)
                                            {{round((intval($user_data -> registered) / intval($user_data -> visit)) * 100)}}
                                        @else
                                            {{0}}
                                        @endif
                                        %</h3></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Clients</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($referral as $ru)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{$ru -> first_name}} {{$ru -> last_name}}</td>
                                            <td>{{$ru -> email}}</td>
                                            <td>{{$ru -> username}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
