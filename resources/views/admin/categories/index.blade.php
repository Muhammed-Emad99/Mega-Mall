@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Categories
    @endsection

    @section('section-header')
        <h1>Categories</h1>
        <div class="section-header-button">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></div>
            <div class="breadcrumb-item">All Categories</div>
        </div>
    @endsection

    @section('section-body')
        <h2 class="section-title">Categories</h2>
        <p class="section-lead">
            You can manage all categories, such as editing, deleting and more.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($categories) > 0)
                            <div class="table-responsive text-center">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>{!!  $category->description!!}  </td>
                                            <td>
                                                <img class="img-shadow rounded" width="60px" height="40px" src="{{ File::exists('uploads/categories/' . $category->image) &&
                                                $category->image != null ? asset('uploads/categories/' . $category->image)
                                                : asset('assets/img/avatar/avatar-1.png') }}"
                                                     alt="Generic placeholder image"></td>
                                            <td>
                                                <div class="">
                                                    <a href="{{ route('admin.categories.show' ,$category->id) }}"
                                                       class="text-success">Show</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('admin.categories.edit' ,$category->id) }}"
                                                       class="text-success">Edit</a>
                                                    <div class="bullet"></div>
                                                    <form method="post" class="d-inline"
                                                          action="{{ route('admin.categories.destroy', $category->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                                class="btn btn-link text-danger bg-transparent border-0 p-0">
                                                            Trash
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                {{ $categories->links() }}
                            </div>
                        @else
                            <div class="text-center">
                                There are no categories yet click <strong>add new </strong> above and add new role.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
