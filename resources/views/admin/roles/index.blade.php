@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Roles
    @endsection

    @section('section-header')
        <h1>Roles</h1>
        @if(Auth::user()->hasRole(['super-admin']))
            <div class="section-header-button">
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Add New</a>
            </div>
        @endif
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></div>
            <div class="breadcrumb-item">All Roles</div>
        </div>
    @endsection

    @section('section-body')
        <h2 class="section-title">Roles</h2>
        <p class="section-lead">
            You can manage all roles, such as editing, deleting and more.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($roles) > 0)
                            <div class="table-responsive text-center">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        @if(Auth::user()->hasRole(['super-admin']))
                                            <th>Permissions</th>
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            @if(Auth::user()->hasRole('super-admin'))
                                                <td>
                                                    @if(count($role->permissions)>0 )
                                                        <a href="{{ route('admin.roles.show' ,$role->id) }}"
                                                           class="text-muted">View Role Details With Permissions</a>
                                                    @else
                                                        There are no permissions to this role click
                                                        <strong>edit </strong>
                                                        and
                                                        edit permissions.
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <a href="{{ route('admin.roles.edit' ,$role->id) }}"
                                                           class="text-success">Edit</a>
                                                        <div class="bullet"></div>
                                                        <form method="post" class="d-inline"
                                                              action="{{ route('admin.roles.destroy', $role->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                    class="btn btn-link text-danger bg-transparent border-0 p-0">
                                                                Trash
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @else
                                                Only super admins can edit, remove or view this role details
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                {{ $roles->links() }}
                            </div>
                        @else
                            <div class="text-center">
                                There are no roles yet click <strong>add new </strong> above and add new role.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
