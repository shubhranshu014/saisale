<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // -----------------------------
        // Create Permissions
        // -----------------------------
        // Dashboard
        Permission::firstOrCreate(['name' => 'view dashboard']);

        // Inventory
        Permission::firstOrCreate(['name' => 'manage products']);
        Permission::firstOrCreate(['name' => 'view stock']);
        Permission::firstOrCreate(['name' => 'manage suppliers']);
        Permission::firstOrCreate(['name' => 'manage purchase orders']);

        // Orders
        Permission::firstOrCreate(['name' => 'create orders']);
        Permission::firstOrCreate(['name' => 'view orders']);
        Permission::firstOrCreate(['name' => 'view invoices']);

        // Accounting
        Permission::firstOrCreate(['name' => 'manage payments']);
        Permission::firstOrCreate(['name' => 'manage receipts']);
        Permission::firstOrCreate(['name' => 'view accounting reports']);
        Permission::firstOrCreate(['name' => 'view tax reports']);

        // CRM
        Permission::firstOrCreate(['name' => 'manage customers']);
        Permission::firstOrCreate(['name' => 'manage leads']);
        Permission::firstOrCreate(['name' => 'manage followups']);

        // HRMS
        Permission::firstOrCreate(['name' => 'manage employees']);
        Permission::firstOrCreate(['name' => 'manage attendance']);
        Permission::firstOrCreate(['name' => 'process payroll']);
        Permission::firstOrCreate(['name' => 'manage leaves']);

        // Settings / Admin
        Permission::firstOrCreate(['name' => 'manage general settings']);
        Permission::firstOrCreate(['name' => 'manage users']);
        Permission::firstOrCreate(['name' => 'edit profile']);

        // -----------------------------
        // Create Roles & Assign Permissions
        // -----------------------------
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        $roleSales = Role::firstOrCreate(['name' => 'sales']);
        $roleSales->givePermissionTo([
            'create orders',
            'view orders',
            'view invoices',
            'view dashboard',
            'manage customers',
            'manage leads',
            'manage followups',
        ]);

        $roleAccounting = Role::firstOrCreate(['name' => 'accounting']);
        $roleAccounting->givePermissionTo([
            'manage payments',
            'manage receipts',
            'view accounting reports',
            'view tax reports',
            'view dashboard',
        ]);

        $roleWarehouse = Role::firstOrCreate(['name' => 'warehouse']);
        $roleWarehouse->givePermissionTo([
            'manage products',
            'view stock',
            'manage suppliers',
            'manage purchase orders',
            'view dashboard',
        ]);

        $roleHR = Role::firstOrCreate(['name' => 'hr']);
        $roleHR->givePermissionTo([
            'manage employees',
            'manage attendance',
            'process payroll',
            'manage leaves',
            'view dashboard',
        ]);
    }
}
