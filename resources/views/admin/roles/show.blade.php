@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Roles
    @endsection


    @section('section-header')
        <div class="section-header-back">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Show Role Details</h1>
            <div class="section-header-button">
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Add New</a>
            </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Roles</a></div>
            <div class="breadcrumb-item">Show Role Details</div>
        </div>

    @endsection

    @section('section-body')
        <h2 class="section-title">Show Role Details</h2>
        <p class="section-lead">
            On this page you can show a <strong>role details</strong>.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <div class="d-flex align-items-center">
                            <h4>{{ strtoupper($role->name) }}</h4>
                            @if(Auth::user()->hasRole('super-admin'))
                                <div class="section-header-button">
                                    <a href="{{ route('admin.roles.edit',$role->id) }}" class="btn btn-success">Edit</a>
                                </div>
                            @endif
                        </div>

                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                    class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse" style="">
                        <div class="card-body">
                            <div class="">Permissions</div>
                            @if(Auth::user()->hasRole('super-admin'))
                                <div class="row">
                                    @foreach($role->permissions as $permission)
                                        <div class="col-2 m-2">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-link d-flex justify-content-between align-items-center"
                                                   aria-expanded="false">
                                                    <span>{{ $permission->name }}</span>
                                                    <i class="fa fa-caret-down"></i>
                                                </a>
                                                <div class="dropdown-menu"
                                                     x-placement="bottom-start"
                                                     style="position: absolute; transform: translate3d(0px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a href="{{ route('admin.permissions.edit' ,$permission->id) }}"
                                                       class="dropdown-item has-icon"><i
                                                            class="far fa-edit"></i> Edit</a>
                                                    {{--                                                    <form method="post" class="d-inline"--}}
                                                    {{--                                                          action="{{ route('admin.roles.trash', $permission->id) }}">--}}
                                                    {{--                                                        @csrf--}}
                                                    {{--                                                        @method('delete')--}}
                                                    {{--                                                        <button type="submit" class="dropdown-item has-icon"--}}
                                                    {{--                                                                style="padding: 10px 20px;font-weight: 500;line-height: 1.2;font-size: 13px;">--}}
                                                    {{--                                                            <i class="far fa-trash-alt text-danger"></i>Trash</button>--}}
                                                    {{--                                                    </form>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            @if(Auth::user()->hasRole('admin'))
                                <div class="row">
                                    @foreach($role->permissions as $permission)
                                        <div class="col-2 m-2">
                                            <span class="badge badge-primary">{{ $permission->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                Created At: {{ $permission->created_at->format('Y-m-d')}}
                            </div>
                            <div>
                                Updated At: {{ $permission->updated_at->format('Y-m-d')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
