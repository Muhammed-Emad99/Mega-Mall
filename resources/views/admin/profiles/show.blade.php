@extends('admin.layouts.admin-layout')
@section('title')
    Admin | Profile
@endsection


@section('section-header')
    <div class="section-header-back">
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
    </div>
@endsection

@section('section-body')
    <h2 class="section-title">Profile</h2>
    <p class="section-lead">
        On this page you can show a user Profile Details.
    </p>

    <div class="card">
        {{--        <div class="card-header">--}}
        {{--            <h4>Default Tab</h4>--}}
        {{--        </div>--}}
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-2">
                    <ul class="nav nav-pills flex-column " id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="data-tab" data-toggle="tab" href="#userData" role="tab"
                               aria-controls="userData" aria-selected="true">User Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="password-tab" data-toggle="tab" href="#passwordData" role="tab"
                               aria-controls="passwordData" aria-selected="false">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit"
                                        class="nav-link d-flex align-items-center dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-10">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="userData" role="tabpanel" aria-labelledby="data-tab">
                            @include('admin.profiles.data')
                        </div>
                        <div class="tab-pane fade" id="passwordData" role="tabpanel" aria-labelledby="password-tab">
                            @include('admin.profiles.password')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
