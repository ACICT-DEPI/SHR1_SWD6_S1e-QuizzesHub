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
            'fname' => 'Mohamed',
            'lname' => 'Nayef',
            'username' => 'mohamednayef',
            'email' => 'mohamednayef@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '01026660223',
            'image_path' => null,
            'gender' => 'M',
            'role' => 'owner',
            'score' => '0',
            'university_id' => null,
            'faculty_id' => null,
            'major_id' => null,
            'level_id' => null,
        ]);
    }
}
