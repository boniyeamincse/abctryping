<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create super admin user for testing
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@abctyping.com',
            'password' => Hash::make('SuperAdmin123!'),
            'role' => 'super_admin'
        ]);

        // Create institution admin user for testing
        User::create([
            'name' => 'Institution Admin',
            'email' => 'institution@abctyping.com',
            'password' => Hash::make('Institution123!'),
            'role' => 'institution_admin'
        ]);

        // Create teacher user for testing
        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@abctyping.com',
            'password' => Hash::make('Teacher123!'),
            'role' => 'teacher'
        ]);

        // Create regular user for testing
        User::create([
            'name' => 'Regular User',
            'email' => 'user@abctyping.com',
            'password' => Hash::make('User123!'),
            'role' => 'user'
        ]);

        // Seed learning module data
        $this->call([
            LearningModuleSeeder::class
        ]);
    }
}
