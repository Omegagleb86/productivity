<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('people')->insert([
            'FIO' => 'Алёша Попович',
            'birth_date' => '2005-05-01',
        ]);

        DB::table('people')->insert([
            'FIO' => 'Горыныч',
            'birth_date' => '2006-03-16',
        ]);
    }
}
