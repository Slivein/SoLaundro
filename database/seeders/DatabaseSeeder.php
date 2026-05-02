<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = ['Admin', 'Cashier', 'Deliverer', 'Customer'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        $adminPassword = env('ADMIN_PASSWORD', 'password');

        $adminRole = Role::where('name', 'Admin')->first();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => $adminEmail,
            'password' => bcrypt($adminPassword),
            'role_id' => $adminRole->id,
        ]);
    }
}
