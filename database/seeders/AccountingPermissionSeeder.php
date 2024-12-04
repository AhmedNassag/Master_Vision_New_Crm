<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AccountingPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'إدارة الحسابات',
            //الإيصالات
            'عرض الإيصالات',
            'إضافة الإيصالات',
            'تعديل الإيصالات',
            'حذف الإيصالات',
            //تقرير الإيصالات
            'عرض تقارير الإيصالات',
            'إضافة تقارير الإيصالات',
            'تعديل تقارير الإيصالات',
            'حذف تقارير الإيصالات',
        ];



        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        /*
        $user         = User::first();
        $role         = Role::first();
        $permissionss = Permission::whereIn('name',$permissions)->pluck('id','id')->all();
        $role->syncPermissions($permissionss);
        $user->assignRole([$role->id]);
        */
    }
}
