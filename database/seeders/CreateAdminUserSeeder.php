<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      //Admin Seeder
    /*  $user = User::create([
          'name' => 'Laravel',
          'email' => 'laravel@gmail.com',
          'password' => bcrypt('laravel')
      ]); */

      //$role = Role::create(['name' => 'Admin','guard_name'=>'web']);

      $permissions = Permission::pluck('id','id')->all();

      $role->syncPermissions($permissions);

      $user->assignRole([$role->id]);
  }
    }
