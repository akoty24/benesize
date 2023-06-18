<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'create','guard_name' => 'admin']);
        Permission::create(['name' => 'read','guard_name' =>'admin']);
        Permission::create(['name' => 'update','guard_name' => 'admin']);
        Permission::create(['name' => 'delete','guard_name' => 'admin']);
    }
}
