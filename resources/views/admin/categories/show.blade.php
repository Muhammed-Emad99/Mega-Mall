@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Categories
    @endsection


    @section('section-header')
        <div class="section-header-back">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Show Category Details</h1>
        <div class="section-header-button">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></div>
            <div class="breadcrumb-item">Show Category Details</div>
        </div>

    @endsection

    @section('section-body')
        <h2 class="section-title">Show Category Details</h2>
        <p class="section-lead">
            On this page you can show a <strong>category details</strong>.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <div class="d-flex align-items-center">
                            <h4>{{ ucwords($category->title) }}</h4>
                            <div class="section-header-button">
                                <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-success">Edit</a>
                            </div>
                        </div>

                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                    class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse" style="">
                        <div class="card-body">
                            <div class="mb-2 text-muted">{!! $category->description !!}</div>
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="w-50 h-50 img-shadow" src="{{ File::exists('uploads/categories/' . $category->image) &&
                                                $category->image != null ? asset('uploads/categories/' . $category->image)
                                                : asset('assets/img/avatar/avatar-1.png') }}"
                                     alt="Generic placeholder image">
                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                Created At: {{ $category->created_at->format('Y-m-d')}}
                            </div>
                            <div>
                                Updated At: {{ $category->updated_at->format('Y-m-d')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
