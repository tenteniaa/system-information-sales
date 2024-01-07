<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleid = array([21, 22, 23, 24, 25, 26, 27, 28]);
        $user = User::create([
            'name' => 'Sales', 
            'email' => 'sales@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['name' => 'Sales']);
     
        //$permissions = Permission::pluck('id','id')->:5;
   
        $role->syncPermissions($roleid);
     
        $user->assignRole([$role->id]);
    }
}
