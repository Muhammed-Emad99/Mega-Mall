<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
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
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => "web"]);
        }
    }
}
