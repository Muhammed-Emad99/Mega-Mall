@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Roles
    @endsection


    @section('section-header')
        <div class="section-header-back">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Role</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></div>
            <div class="breadcrumb-item">Create New Role</div>
        </div>

    @endsection

    @section('section-body')
        <h2 class="section-title">Create New Role</h2>
        <p class="section-lead">
            On this page you can create a new <strong>role</strong>.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.roles.store') }}"
                              class="validated">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="name">Role Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                                       name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback mb-3">{{ $message }}</div
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="guard_name">Guard Name</label>
                                <select class="form-control @error('guard_name') is-invalid @enderror" id="guard_name"
                                        name="guard_name">
                                    <option value="web" selected>Web</option>
                                    <option value="api">Api</option>
                                </select>
                                @error('guard_name')
                                <div class="invalid-feedback mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="permissions">Permissions</label>
                                <div class="row">

                                    @foreach($permissions as $permission)
                                        <div class="col-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       value="{{ $permission->name }}"
                                                       id="checkbox-{{ $permission->id }}" name="permissions[]">
                                                <label class="custom-control-label"
                                                       for="checkbox-{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            <div class="form-group mb-4">
                                <button class="btn btn-primary">Create Role</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
