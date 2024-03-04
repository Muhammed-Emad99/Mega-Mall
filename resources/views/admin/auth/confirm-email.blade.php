@extends("admin.layouts.auth-layout")
@section('title')
    Admin | Login
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Confirm Email</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.confirmEmail') }}" novalidate="">
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
                        <label class="form-control-label" for="code">Code</label>
                    </div>
                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror"
                           name="code" value="{{old('code')}}"
                           tabindex="1" required>
                    @error('code')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Confirm Email
                    </button>
                </div>
            </form>
            <div class="mt-5 text-muted text-center">
                <a href="{{ route('admin.loginForm') }}">Login</a>
            </div>
        </div>
    </div>

@endsection
