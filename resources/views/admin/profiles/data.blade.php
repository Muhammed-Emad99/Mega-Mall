<div class="row">

    <form method="post" action="{{ route('admin.profiles.update', $user->id) }}" class="validated w-100 px-3"
          enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-header">
                <h4>Basic Data</h4>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-12 mb-4">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                               id="username" name="username" value="{{ old('username') ?? ($user->name ?? '') }}"
                               tabindex="1" autofocus>
                        @error('username')
                        <div class="invalid-feedback mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                               id="first_name" name="first_name"
                               value="{{ old('first_name') ?? ($user->profile->first_name ?? '') }}" tabindex="2">
                        @error('first_name')
                        <div class="invalid-feedback mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                               id="last_name" name="last_name"
                               value="{{ old('last_name') ?? ($user->profile->last_name ?? '') }}" tabindex="3">
                        @error('last_name')
                        <div class="invalid-feedback mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email" value="{{ old('email') ?? ($user->email ?? '') }}" tabindex="4">
                    @error('email')
                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                           id="phone_number" name="phone_number"
                           value="{{ old('phone_number') ?? ($user->profile->phone_number ?? '') }}" tabindex="6">
                    @error('phone_number')
                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Address Data</h4>
            </div>
            <div class="card-body">
                <div class="form-row justify-content-between">
                    @if ($user->profile == null)
                        <div class="form-group col-12 col-md-4">
                            <label for="country">Country</label>
                            <select id="country" class="form-control @error('country') is-invalid @enderror"
                                    name="country" tabindex="6">
                                <option value="0" selected>--Please choose an option--</option>
                                @foreach ($countries as $country)
                                    <option
                                        value="{{ $country->id }}">
                                        {{ ucwords($country->name) }}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                        <div class="form-group col-12 col-md-4">
                            <label for="country">Country</label>
                            <select id="country" class="form-control @error('country') is-invalid @enderror"
                                    name="country" tabindex="6">
                                <option value="0" selected>--Please choose an option--</option>
                                @foreach ($countries as $country)
                                    <option
                                        value="{{ $country->id }}" @selected($user->profile->country_id == $country->id)>
                                        {{ ucwords($country->name) }}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                            @enderror
                        </div>

                    @endif
                    @if ($user->profile == null)
                        <div class="form-group col-12 col-md-4">
                            <label for="state">State</label>
                            <select id="state" class="form-control @error('state') is-invalid @enderror"
                                    name="state" tabindex="7">
                            </select>
                            @error('state')
                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                        <div class="form-group col-12 col-md-4">
                            <label for="state">State</label>
                            <select id="state" class="form-control @error('state') is-invalid @enderror"
                                    name="state" tabindex="7">
                                <option value="0" selected>--Please choose an option--</option>
                                @foreach ($states as $state)
                                    <option
                                        value="{{ $state->id }}" @selected($user->profile->state_id == $state->id)>
                                        {{ ucwords($state->name) }}</option>
                                @endforeach
                            </select>
                            @error('state')
                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                    @if ($user->profile == null)
                        <div class="form-group col-12 col-md-4">
                            <label for="city">City</label>
                            <select id="city" class="form-control @error('city') is-invalid @enderror"
                                    name="city" tabindex="7">
                            </select>
                            @error('city')
                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                        <div class="form-group col-12 col-md-4">
                            <label for="city">City</label>
                            <select id="city" class="form-control @error('city') is-invalid @enderror"
                                    name="city" tabindex="7">
                                <option value="0" selected>--Please choose an option--</option>
                                @foreach ($cities as $city)
                                    <option
                                        value="{{ $city->id }}" @selected($user->profile->city_id == $city->id)>
                                        {{ ucwords($city->name) }}</option>
                                @endforeach
                            </select>
                            @error('city')
                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Image Data</h4>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <div class="row justify-content-md-between">
                        <div class="col-12 col-md-4 mb-4 mb-md-0">
                            <div class="image-preview" style="@error('image') border-color: #dc3545; @enderror">
                                <label for="imageUpload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="imageUpload" tabindex="10"
                                       accept="*/*"/>
                            </div>
                            @error('image')
                            <div class="mb-3"
                                 style="width: 100%;margin-top: 0.25rem;font-size: 0.875em;color: #dc3545;">
                                {{ $message }}</div>
                            @enderror
                        </div>

                        @if ($user->profile == null)
                            <div class="col-12 col-md-4">
                                <div class="image-preview d-flex justify-content-end align-items-end"
                                     id="imagePreview"
                                     style="background-image: url({{asset('assets/img/no-image.png') }} ); @error('image') border-color: #dc3545; @enderror">
                                </div>

                            </div>
                        @else
                            <div class="col-12 col-md-4">
                                <div class="image-preview d-flex justify-content-end align-items-end"
                                     id="imagePreview"
                                     style="background-image: url(  {{ File::exists('uploads/profiles/' . $user->name . '/' . $user->profile->image) &&
                                $user->profile->image != null
                                    ? asset('uploads/profiles/' . $user->name . '/' . $user->profile->image)
                                    : asset('assets/img/no-image.png') }} ); @error('image') border-color: #dc3545; @enderror">


                                </div>

                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

                $('#country').on('change', function () {
                    var country_id = $('#country').find(':selected').val();
                    $.ajax({
                        url: '/admin/states/index/' + country_id,
                        type: 'GET',
                        success: function (response) {
                            $('#state').html(response.html);
                        },
                    });
                });


                $('#state').on('change', function () {
                    var state_id = $(this).find(':selected').val();
                    $.ajax({
                        url: '/admin/cities/index/' + state_id,
                        type: 'GET',
                        success: function (response) {
                            // Replace the content of the statesContainer with the rendered HTML
                            $('#city').html(response.html);
                        },
                    });
                });

            }
        )


        imageUpload.onchange = evt => {
            const [file] = imageUpload.files
            if (file) {
                imagePreview.style.backgroundImage = 'url("' + URL.createObjectURL(file) + '")';
            }
        }
    </script>
@endpush
