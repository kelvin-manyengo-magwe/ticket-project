<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //resetting the cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $manageUsers = [
          'show-user','show-users','edit-user','delete-user','create-user',
        ];
        $manageTickets = [
          'show-ticket','show-tickets','edit-ticket','delete-ticket','create-ticket',
        ];


        $admin= Role::findByName('Admin');

          foreach($manageUsers as $permissionName) {
          //  Permission::create(['name'=>$permissionName, 'guard_name'=>'web']);
            $admin->syncPermissions($permissionName);
          }
          foreach($manageTickets as $permissionName) {
            //Permission::create(['name'=>$permissionName, 'guard_name'=>'web']);
            $admin->syncPermissions($permissionName);
          }

              //  $admin = Role::create(['name'=>'Admin', 'guard_name'=>'web']);


        //creating of the default role
      //  $default = Role::create(['name'=>'Staff', 'guard_name'=>'web']);



    }
}
