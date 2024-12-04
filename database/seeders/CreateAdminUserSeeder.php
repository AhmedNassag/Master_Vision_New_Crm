<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $employee = Employee::create([
            'name'       => 'Ahmed Nabil',
            'email'      => 'ahmednassag@gmail.com',
            'mobile'     => '01016856433',
            'hidden'     => 1,
        ]);

        $user = User::create([
            'name'       => 'Ahmed Nabil',
            'email'      => 'ahmednassag@gmail.com',
            'mobile'     => '01016856433',
            'password'   => bcrypt('12345678'),
            'status'     => 1,
            'active'     => 1,
            'roles_name' => ["Admin"],
            'context_id' => $employee->id,
            'hidden'     => 1,
        ]);
        //admin role
        $role        = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        //other roles
        $role_2 = Role::create(['name' => 'Employee']);
        $role_2->syncPermissions($permissions);
    }
}
