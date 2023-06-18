<?php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '987654321', // Update the phone number here
            'image' => null,
            'password' => bcrypt('123456789'),
        ]);

        $admin->assignRole('admin');
        $admin->givePermissionTo(['create', 'read', 'update', 'delete']);
    }
}
