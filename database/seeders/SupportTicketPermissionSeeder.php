<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SupportTicketPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //تذاكر الدعم 
            'عرض تذاكر الدعم',
        ];



        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        /*
        $user         = User::first();
        $role         = Role::first();
        $permissionss = Permission::where('name','عرض تذاكر الدعم')->pluck('id','id')->all();
        $role->syncPermissions($permissionss);
        $user->assignRole([$role->id]);
        */
    }
}
