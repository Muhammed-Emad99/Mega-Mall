<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', ['role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        try {
            $role = Role::create($request->except('permissions'));
            $permissions = $request->permissions;
            $role->givePermissionTo(
                $permissions
            );
            return redirect()->route('admin.roles.index');

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        if (count($permissions) > 0) {
            return view('admin.roles.create', ['permissions' => $permissions]);
        }
        return view('admin.permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        if (count($permissions) > 0) {
            return view('admin.roles.edit', ['role' => $role, 'permissions' => $permissions]);
        }
        return view('admin.permissions.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        try {

            $role->update($request->except('permissions'));
            $permissions = $request->permissions;
            $role->revokePermissionTo(
                $role->permissions
            );

            $role->givePermissionTo(
                $permissions
            );
            return redirect()->route('admin.roles.show',$role->id);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index');
    }


}
