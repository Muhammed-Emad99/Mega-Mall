@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Users
    @endsection


    @section('section-header')
        <div class="section-header-back">
            <a href="{{ route('admin.users.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></div>
            <div class="breadcrumb-item">Create New User</div>
        </div>

    @endsection

    @section('section-body')
        <h2 class="section-title">Create New User</h2>
        <p class="section-lead">
            On this page you can <strong>create</strong> a new user.
        </p>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admin.users.store') }}" class="validated">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic Data</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-12 mb-4">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                           id="username" name="username" value="{{ old('username') }}" tabindex="1"
                                           autofocus>
                                    @error('username')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email') }}"
                                       tabindex="2">
                                @error('email')
                                <div class="invalid-feedback mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            @if(Auth::user()->hasRole(['super-admin']))
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" name="role" tabindex="4"
                                            class="form-control @error('role') is-invalid @enderror">
                                        <option value="0" selected>--Please choose an option--</option>
                                        @foreach($roles as $role)
                                            <option
                                                value="{{ $role->id }}" @selected(old('role') == $role->id)>{{ ucwords($role->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            @else
                                <div class="form-row">
                                    <input type="hidden" id="role" name="role" value="user">
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h4>Password Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="password">Password</label>
                                    <input type="password" id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" value="{{ old('password') }}" tabindex="4">
                                    @error('password')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input type="password"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="password_confirmation" name="password_confirmation"
                                           value="{{ old('password_confirmation') }}"
                                           tabindex="5">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
@endif

