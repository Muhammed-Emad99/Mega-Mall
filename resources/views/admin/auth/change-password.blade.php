@extends('admin.layouts.auth-layout')
@section('title')
    Admin | Login
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Change Password</h4></div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.changePassword') }}" class="" novalidate="">
                @csrf
                @method('post')
                <div class="form-group">
                    @if(session('message-success'))
                        <span class="text-success" role="alert">
                            <strong>{{session('message-success')}}</strong>
                        </span>
                        @endif
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label class="form-control-label" for="new_password">Email</label>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           value="{{old('email')}}" tabindex="2" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label class="form-control-label" for="new_password">Password</label>
                    </div>
                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror"
                           name="new_password"
                           value="{{old('new_password')}}" tabindex="2" required>
                    @error('new_password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label class="form-control-label" for="new_password_confirmation">Confirm Password</label>
                    </div>
                    <input id="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                           name="new_password_confirmation"
                           value="{{old('new_password_confirmation')}}" tabindex="3" required>
                    @error('new_password_confirmation')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Change Password
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
