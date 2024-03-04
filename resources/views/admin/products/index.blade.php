@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Products
    @endsection

    @section('section-header')
        <h1>Products</h1>
        <div class="section-header-button">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></div>
            <div class="breadcrumb-item">All Products</div>
        </div>
    @endsection

    @section('section-body')
        <h2 class="section-title">Products</h2>
        <p class="section-lead">
            You can manage all products, such as editing, deleting and more.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($categories) > 0)

                            @if (count($products) > 0)
                                <div class="table-responsive text-center">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Images</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Quantity</th>
                                            <th>Featured</th>
                                            <th>Categories</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>
                                                    <img class="img-shadow rounded mx-2" width="60px" height="40px"
                                                         alt="image"
                                                         src="{{ File::exists('uploads/products/' . $product->slug . '/'.$product->images->first()->name) &&
                                                                $product->images->first()->name != null ? asset('uploads/products/' . $product->slug . '/'.$product->images->first()->name)
                                                                   : asset('assets/img/avatar/avatar-1.png') }}">
                                                </td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->discountPercentage }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->featured }}</td>
                                                <td>
                                                    <div class="d-flex flex-column align-items-center">
                                                        @foreach($product->categories as $category)
                                                            <span class="mx-2">{{$category->title}}</span>
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <a href="{{ route('admin.products.show' ,$product->id) }}"
                                                           class="text-success">Show</a>
                                                        <div class="bullet"></div>
                                                        <a href="{{ route('admin.products.edit' ,$product->id) }}"
                                                           class="text-success">Edit</a>
                                                        <div class="bullet"></div>
                                                        <form method="post" class="d-inline"
                                                              action="{{ route('admin.products.destroy', $product->id) }}">
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
                                    {{ $products->links() }}
                                </div>
                            @else
                                <div class="text-center">
                                    There are no products yet click <strong>add new </strong> above and add new role.
                                </div>
                            @endif
                        @else
                            <div class="text-center">
                                There are no categories yet go to <strong>add new category page</strong> and add new
                                category. <strong>product must belongs to a category.</strong>
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mx-3 ">Add New
                                    Category</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
