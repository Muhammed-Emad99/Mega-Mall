@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Products
    @endsection


    @section('section-header')
        <div class="section-header-back">
            <a href="{{ route('admin.products.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Product</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></div>
            <div class="breadcrumb-item">Create New Product</div>
        </div>

    @endsection

    @section('section-body')
        <h2 class="section-title">Create New Product</h2>
        <p class="section-lead">
            On this page you can create a new <strong>product</strong>.
        </p>

        <div class="row">
            <div class="col-12">
                @if (count($categories) > 0)

                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.products.store') }}"
                                  class="validated" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="title">Product Title</label>
                                    <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                           id="title"
                                           name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="description">Description</label>
                                    <textarea type="text"
                                              class="summernote  @error('description') is-invalid @enderror "
                                              id="description"
                                              name="description">
                                    {{ old('description') }}
                                </textarea>
                                    @error('description')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="image">Product Image</label>
                                    <div class="row justify-content-md-between">
                                        <div class="col-12 col-md-3 mb-4 mb-md-0">
                                            <div class="image-preview w-100"
                                                 style="@error('images') border-color: #dc3545; @enderror">
                                                <label for="multiplefileupload" id="image-label">Choose File</label>
                                                <input type="file" name="images[]" id="multiplefileupload" tabindex="10"
                                                       accept="*/*" multiple/>
                                            </div>
                                            @error('images')
                                            <div class="mb-3"
                                                 style="width: 100%;margin-top: 0.25rem;font-size: 0.875em;color: #dc3545;">
                                                {{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-9">
                                            <div
                                                class="image-preview h-auto" style="@error('images') border-color: #dc3545; @enderror"
                                                id="imagePreview">
                                                <div class="d-flex justify-content-center align-items-center w-100">
                                                    <img src="{{asset('assets/img/no-image.png') }}"
                                                         class="preview-image" style="width:250px; height:200px">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="price">Product Price</label>
                                    <input type="text" class="form-control  @error('price') is-invalid @enderror"
                                           id="price"
                                           name="price" value="{{ old('price') }}">
                                    @error('price')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="quantity">Product Quantity</label>
                                    <input type="text" class="form-control  @error('quantity') is-invalid @enderror"
                                           id="quantity"
                                           name="quantity" value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="discountPercentage">Product Discount</label>
                                    <input type="text"
                                           class="form-control  @error('discountPercentage') is-invalid @enderror"
                                           id="discountPercentage"
                                           name="discountPercentage" value="{{ old('discountPercentage') }}">
                                    @error('discountPercentage')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label">Featured</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="featured"
                                                   value="1" class="selectgroup-input w-100 h-100">
                                            <span class="selectgroup-button">Featured</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="featured"
                                                   value="0" class="selectgroup-input w-100 h-100"
                                                   checked>
                                            <span class="selectgroup-button">Not Featured</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label" for="multiple-select-field">Categories</label>
                                    <select class="form-select select2" id="multiple-select-field"
                                            data-placeholder="--Please choose an option--" name="selectedCategories[]"
                                            multiple>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}" {{ in_array($category->id, old('selectedCategories', [])) ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>


                                    @error('selectedCategories')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div
                                    @enderror

                                </div>

                                <div class="form-group mb-4">
                                    <button class="btn btn-primary">Create Product</button>
                                </div>

                            </form>

                        </div>
                    </div>

                @else
                    <div class="text-center">
                        There are no categories yet go to <strong>add new category page</strong> and add new
                        category. <strong>product must belong to a category.</strong>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mx-3 ">Add New
                            Category</a>
                    </div>
                @endif
            </div>
        </div>
    @endsection
@endif

@push('css')
    <style>
        .select2-container {
            width: 100% !important;
        }

        .image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            min-height: 250px;
            width: 100%;
            padding: 20px 20px;

        }

        .upload-place {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: calc(90% / 6);
            height: calc(180px / 3);
        }

        .preview-image {
            display: flex;
            width: 100%;
            height: 100%;
            border-radius:15px;
        }

        .upload-place:hover{
            opacity: 0.5;
        }

        .upload-place .remove-button {
            display:none;
        }

        .upload-place:hover .remove-button {
            display:flex;
            border-radius: 50%;
            z-index: 1000;
            position: absolute;
            color: #fff;
            background-color: #ed3237;
            border: 1px solid #ed3237;
            padding: 2px 6px;
            font-size: 11px;
            transition: 0.5s;
            cursor: pointer;
        }


    </style>
@endpush
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('.summernote').summernote();


            $(document).ready(function () {
                $('.select2').select2({})
            })
        })

        $('#multiplefileupload').on('change', function (e) {
            // Get the selected files
            var files = e.target.files;

            // Clear the previous images
            $('#imagePreview').empty();

            // Iterate over selected files and append images to the preview container
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var uploadPlace = $('<div>').addClass('upload-place');
                    var image = $('<img>').attr('src', e.target.result).addClass('preview-image');
                    var removeButton = $('<button>').addClass('remove-button');
                    var icon = $('<i>').addClass('fa fa-times');

                    removeButton.on('click', function () {
                        uploadPlace.remove(); // Remove the corresponding image container
                    });

                    // $('#uploadPlace').append(image);
                    removeButton.append(icon);
                    uploadPlace.append(image).append(removeButton);
                    $('#imagePreview').append(uploadPlace);
                };

                reader.readAsDataURL(files[i]);
            }

        });


    </script>
@endpush
