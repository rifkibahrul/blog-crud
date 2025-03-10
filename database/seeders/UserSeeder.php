<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'name' => 'Admin User',
                'role' => 'admin'
            ],
            [
                'username' => 'author',
                'password' => Hash::make('author'),
                'name' => 'Author User',
                'role' => 'author'
            ],
        ]);
    }
}
