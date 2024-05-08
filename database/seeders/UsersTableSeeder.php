<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([[
           'name' => 'Berkin',
           'email' => 'berkin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'status' => 'active'
        ],
            [
                'name' => 'Test User',
                'email' => 'test@test.com',
                'password' => bcrypt('123456'),
                'role' => 'user',
                'status' => 'active'
            ]
        ]
        );

    }
}
