<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'systems admin',
            'password' => Hash::make('root')
        ]);
        User::create([
            'name' => 'Dumisani Kaliati',
            'email' => 'dumi@admin.com',
            'role' => 'admin',
            'password' => Hash::make('root')
        ]);
        User::create([
            'name' => 'Elijah Kawinga',
            'email' => 'ej@admin.com',
            'role' => 'staff',
            'occupation' => 'Senior Systems Developer',
            'description' => 'Skilled programmer with more than 50 projects completed successfully and over a decade of expirience.',
            'password' => Hash::make('root')
        ]);
        User::create([
            'name' => 'Allan Mpate',
            'email' => 'allan@admin.com',
            'role' => 'normal',
            'password' => Hash::make('root')
        ]);

    }
}
