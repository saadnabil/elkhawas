<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreatePermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dashboard',

            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'admin-export',

            'item-list',
            'item-create',
            'item-edit',
            'item-delete',
            'item-export',

            'order-list',
            'order-show',
            'order-track',
            'order-print-invoice',
            'order-send-invoice',
            'order-edit-status',
            'product-export',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-export',

        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                [
                    'name' => $permission,
                    'guard_name' => 'admin',
                ],
            );
        }
    }
}
