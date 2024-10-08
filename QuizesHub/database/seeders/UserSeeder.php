<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'fname' => 'Owner',
            'lname' => 'Owner',
            'username' => 'owner',
            'email' => 'owner@quizzeshub.com',
            'email_verified_at' => NOW(),
            'password' => Hash::make('12345678'),
            'image_path' => null,
            'gender' => 'M',
            'role' => 'owner',
            'score' => '0',
            'university_id' => null,
            'faculty_id' => null,
            'major_id' => null,
            'level_id' => null,
        ]);
        User::firstOrCreate([
            'fname' => 'Admin',
            'lname' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@quizzeshub.com',
            'email_verified_at' => NOW(),
            'password' => Hash::make('12345678'),
            'image_path' => null,
            'gender' => 'M',
            'role' => 'admin',
            'score' => '0',
            'university_id' => null,
            'faculty_id' => null,
            'major_id' => null,
            'level_id' => null,
        ]);
        User::firstOrCreate([
            'fname' => 'User',
            'lname' => 'User',
            'username' => 'user',
            'email' => 'user@quizzeshub.com',
            'email_verified_at' => NOW(),
            'password' => Hash::make('12345678'),
            'image_path' => null,
            'gender' => 'M',
            'role' => 'user',
            'score' => '0',
            'university_id' => null,
            'faculty_id' => null,
            'major_id' => null,
            'level_id' => null,
        ]);
            // $table->rememberToken();
            // $table->string('provider_id')->nullable();
            // $table->string('provider')->nullable();
    }
}
