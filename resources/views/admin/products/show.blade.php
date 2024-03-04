@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Products
    @endsection


    @section('section-header')
        <div class="section-header-back">
            <a href="{{ route('admin.products.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Show Product Details</h1>
        <div class="section-header-button">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></div>
            <div class="breadcrumb-item">Show Product Details</div>
        </div>

    @endsection

    @section('section-body')
        <h2 class="section-title">Show Product Details</h2>
        <p class="section-lead">
            On this page you can show a <strong>product details</strong>.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <div class="d-flex align-items-center">
                            <h4>{{ ucwords($product->title) }}</h4>
                            <div class="dropdown show">
                                <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle"
                                   aria-expanded="true">Options</a>
                                <div class="dropdown-menu" x-placement="top-start"
                                     style="position: absolute; transform: translate3d(-10px, -146px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a href="{{ route('admin.products.edit',$product->id) }}"
                                       class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="post" class="d-inline"
                                          action="{{ route('admin.products.destroy', $product->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                                class="dropdown-item has-icon text-danger bg-transparent"
                                                style="padding: 10px 20px;font-weight: 500;line-height: 1.2;font-size: 13px;">
                                            <i class="far fa-trash-alt"></i> Trash
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                    class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse" style="">
                        <div class="card-body">
                            <article class="article article-style-c">
                                <div class="article-header" style="height: 300px!important;">
                                    <div class="article-image h-100">
                                        <div class="row h-100">
                                            <div class="col-3 h-100">
                                                <img class="img-shadow rounded w-100 h-100"
                                                     alt="image"
                                                     src="{{ File::exists('uploads/products/' . $product->slug . '/'.$product->images->first()->name) &&
                                                                $product->images->first()->name != null ? asset('uploads/products/' . $product->slug . '/'.$product->images->first()->name)
                                                                   : asset('assets/img/avatar/avatar-1.png') }}">
                                                @if($product->featured == 1)
                                                    <div class="article-badge" style="left: 25px!important; ">
                                                        <div class="article-badge-item bg-primary"><i
                                                                class="fas fa-feather"></i>
                                                            Featured
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-9 d-flex flex-wrap h-100" style="gap: 0.5rem;">
                                                @foreach($product->images as $image)
                                                    <img class="img-shadow rounded" src="{{ File::exists('uploads/products/' . $product->slug . '/'.$image->name) &&
                                                                $image->name != null ? asset('uploads/products/' . $product->slug . '/'.$image->name)
                                                                   : asset('assets/img/avatar/avatar-1.png') }}"
                                                         style="width: calc(95% / 6); height:120px">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="article-details">
                                    <div class="article-title my-2">
                                        <h2><a href="#">{{ ucwords($product->title) }}</a></h2>
                                    </div>
                                    <div class="article-category d-flex align-items-center p-0 my-2">
                                        @foreach($product->categories as $category)
                                            <a class="p-0 mr-2"
                                               href="{{ route('admin.categories.show',$category->id) }}">{{ucwords($category->title) }}</a>
                                            <div class="bullet mr-2"></div>
                                        @endforeach
                                    </div>
                                    <div class="p-0 my-2">
                                        <p> {!! $product->description !!} </p>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-between">
                                    <div>
                                        Created At: {{ $product->created_at->format('Y-m-d')}}
                                    </div>
                                    <div class="d-flex">
                                        @if($product->quantity > 0 )
                                            <button type="button" class="btn btn-primary btn-icon icon-left">
                                                <i class="fas fa-store"></i> In Stock <span
                                                    class="badge badge-transparent">{{ $product->quantity}}</span>
                                            </button>
                                        @endif
                                            <button type="button" class="btn btn-danger btn-icon icon-left">
                                                <i class="fas fa-store"></i> Out Of Stock <span
                                                    class="badge badge-transparent">{{ $product->quantity}}</span>
                                            </button>

                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
