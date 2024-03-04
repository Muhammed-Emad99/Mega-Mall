@if(Auth::user()->hasRole('super-admin'))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Permissions
    @endsection


    @section('section-header')
        <div class="section-header-back">
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Permission</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permissions</a></div>
            <div class="breadcrumb-item">Create New Permission</div>
        </div>

    @endsection

    @section('section-body')
        <h2 class="section-title">Create New Permission</h2>
        <p class="section-lead">
            On this page you can create a new <strong>permission</strong>.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.permissions.store') }}"
                              class="validated">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="name">Permission Name</label>
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
                                <button class="btn btn-primary">Create Permission</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection

@endif
