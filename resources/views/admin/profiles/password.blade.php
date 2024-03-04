<div class="row">

    <form method="post" action="{{ route('admin.profiles.update', $user->id) }}" class="validated w-100 px-3"
          enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-header">
                <h4>Password Data</h4>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="password">Password</label>
                        <input type="password" id="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               value="{{ old('password') }}" tabindex="12">
                        @error('password')
                        <div class="invalid-feedback mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password"
                               class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="password_confirmation" name="password_confirmation"
                               value="{{ old('password_confirmation') }}" tabindex="13">
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

