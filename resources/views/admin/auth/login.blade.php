@extends('admin.layouts.auth-layout')
@section('title')
    Admin | Login
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Login</h4></div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.login') }}" class="" novalidate="">
                @csrf
                @method('post')
                <div class="form-group">
                    @if(session('message-success'))
                        <span class="text-success" role="alert">
                            <strong>{{session('message-success')}}</strong>
                        </span>
                    @else
                        <span class="text-danger" role="alert">
                            <strong>{{session('message-error')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label class="form-control-label" for="email">Email</label>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{old('email')}}"
                           tabindex="1" required autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label class="form-control-label" for="password">Password</label>
                        <div class="float-right">
                            <a href="{{route("admin.resetPasswordForm")}}" class="text-small">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           value="{{old('password')}}" tabindex="2" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
            {{--            <div class="mt-5 text-muted text-center">--}}
            {{--                Don't have an account? <a href="auth-register.html">Create One</a>--}}
            {{--            </div>--}}
        </div>
    </div>

@endsection
