@if(Auth::user()->hasRole('super-admin'))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Permissions
    @endsection


    @section('section-header')
        <div class="section-header-back">
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Permission</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permissions</a></div>
            <div class="breadcrumb-item">Edit Permission</div>
        </div>

    @endsection

    @section('section-body')
        <h2 class="section-title">Edit Permission</h2>
        <p class="section-lead">
            On this page you can edit a permission.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.permissions.update',$permission->id) }}"
                              class="validated">
                            @csrf
                            @method('put')

                            <div class="form-group mb-4">
                                <label for="name">Permission Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                                       name="name" value="{{ old('name',$permission->name) }}">
                                @error('name')
                                <div class="invalid-feedback mb-3">{{ $message }}</div
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="guard_name">Guard Name</label>
                                <select class="form-control @error('guard_name') is-invalid @enderror" id="guard_name"
                                        name="guard_name">
                                    <option value="web" @selected($permission->guard_name == 'web')>Web</option>
                                    <option value="api" @selected($permission->guard_name == 'api')>Api</option>
                                </select>
                                @error('guard_name')
                                <div class="invalid-feedback mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <button class="btn btn-primary">Update Permission</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
