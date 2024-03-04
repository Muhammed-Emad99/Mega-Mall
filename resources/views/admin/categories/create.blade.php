@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Categories
    @endsection


    @section('section-header')
        <div class="section-header-back">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Categories</a></div>
            <div class="breadcrumb-item">Create New Category</div>
        </div>

    @endsection

    @section('section-body')
        <h2 class="section-title">Create New Category</h2>
        <p class="section-lead">
            On this page you can create a new <strong>category</strong>.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.categories.store') }}"
                              class="validated" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="title">Category Title</label>
                                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                                       name="title" value="{{ old('title') }}">
                                @error('title')
                                <div class="invalid-feedback mb-3">{{ $message }}</div
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="description">Description</label>
                                <textarea type="text" class="summernote  @error('description') is-invalid @enderror"
                                          id="description"
                                          name="description">
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                <div class="invalid-feedback mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="image">Category Image</label>
                                <div class="row justify-content-md-between">
                                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                                        <div class="image-preview"
                                             style="@error('image') border-color: #dc3545; @enderror">
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

                                    <div class="col-12 col-md-4">
                                        <div class="image-preview d-flex justify-content-end align-items-end"
                                             id="imagePreview"
                                             style="background-image: url(  {{asset('assets/img/no-image.png') }} ); @error('image') border-color: #dc3545; @enderror">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <button class="btn btn-primary">Create Category</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

                $('.summernote').summernote();


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
