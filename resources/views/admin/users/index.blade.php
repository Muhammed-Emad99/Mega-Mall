@if(Auth::user()->hasRole(['super-admin','admin']))

    @extends('admin.layouts.admin-layout')
    @section('title')
        Admin | Users
    @endsection

    @section('section-header')
        <h1>Users</h1>
        <div class="section-header-button">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></div>
            <div class="breadcrumb-item">All Users</div>
        </div>
    @endsection

    @section('section-body')
        <h2 class="section-title">Users</h2>
        <p class="section-lead">
            You can manage all users, such as editing, deleting and more.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($users) > 0)
                            <div class="table-responsive text-center">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            @if(Auth::user()->hasRole(['super-admin','admin']) && $user->hasRole(['user']))
                                                <td>
                                                    <div class="">
                                                        <a href="{{ route('admin.users.edit' ,$user->id) }}"
                                                           class="text-success">Edit</a>
                                                        <div class="bullet"></div>
                                                        <form method="post" class="d-inline"
                                                              action="{{ route('admin.users.destroy', $user->id) }}">
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
                                                <td>Super admins only can edit and delete admin or super admin</td>
                                            @endif

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                {{ $users->links() }}
                            </div>
                        @else
                            <div class="text-center">
                                There are no users yet click <strong>add new </strong> above and add new user.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
