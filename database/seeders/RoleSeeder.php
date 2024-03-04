<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = Role::create(['name' => 'super-admin', 'guard_name' => 'web']);
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $user = Role::create(['name' => 'user', 'guard_name' => 'web']);


        $super_admin->givePermissionTo([
            'make-permission',
            'edit-permission',
            'delete-permission',
            'list-permission',
            'make-role',
            'edit-role',
            'delete-role',
            'list-role',
            'make-user',
            'edit-user',
            'delete-user',
            'list-user',
            'make-product',
            'edit-product',
            'delete-product',
            'list-product',
            'make-category',
            'edit-category',
            'delete-category',
            'list-category',
            'make-coupon',
            'edit-coupon',
            'delete-coupon',
            'list-coupon',
            'make-order',
            'edit-order-status',
            'edit-order',
            'delete-order',
            'list-order',
            'make-slider',
            'edit-slider',
            'delete-slider',
            'list-slider',
            'edit-logo',
        ]);

        $admin->givePermissionTo([
            'make-user',
            'edit-user',
            'delete-user',
            'list-user',
            'make-product',
            'edit-product',
            'delete-product',
            'list-product',
            'make-category',
            'edit-category',
            'delete-category',
            'list-category',
            'make-coupon',
            'edit-coupon',
            'delete-coupon',
            'list-coupon',
            'edit-order-status',
            'delete-order',
            'list-order',
            'make-slider',
            'edit-slider',
            'delete-slider',
            'list-slider',
            'edit-logo',
        ]);

        $user->givePermissionTo([
            'list-product',
            'list-category',
            'list-coupon',
            'make-order',
            'edit-order',
            'delete-order',
            'list-order',
            'list-slider',
        ]);

    }
}
