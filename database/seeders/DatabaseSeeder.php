<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // В дальнейшем пароль будет нормальный и адекватный. Честно
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@productivity.ru',
            'password' => '123',
            'permision' => '1',
        ]);
    }
}
