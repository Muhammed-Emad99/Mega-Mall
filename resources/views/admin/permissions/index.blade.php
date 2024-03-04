@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Permissions
    @endsection

    @section('section-header')
        <h1>Permissions</h1>
        @if(Auth::user()->hasRole('super-admin'))
            <div class="section-header-button">
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">Add New</a>
            </div>
        @endif
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permissions</a></div>
            <div class="breadcrumb-item">All Permissions</div>
        </div>
    @endsection

    @section('section-body')
        <h2 class="section-title">Permissions</h2>
        <p class="section-lead">
            You can manage all permissions, such as editing, deleting and more.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($permissions) > 0)
                            <div class="table-responsive text-center">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        @if(Auth::user()->hasRole('super-admin'))
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                            @if(Auth::user()->hasRole('super-admin'))

                                                <td>
                                                    <div class="">
                                                        <a href="{{ route('admin.permissions.edit' ,$permission->id) }}"
                                                           class="text-success">Edit</a>
                                                        <div class="bullet"></div>
                                                        <form method="post" class="d-inline"
                                                              action="{{ route('admin.permissions.destroy', $permission->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                    class="btn btn-link text-danger bg-transparent border-0 p-0">
                                                                Trash
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                {{ $permissions->links() }}
                            </div>
                        @else
                            <div class="text-center">
                                There are no permissions yet click <strong>add new </strong> above and add new
                                permission.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
