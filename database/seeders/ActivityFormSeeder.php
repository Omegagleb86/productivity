<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activity_form')->insert([
            'person_id' => '1',
            'name' => 'Сбивание дубов',
            'max_rate' => '88',
        ]);

        DB::table('activity_form')->insert([
            'person_id' => '2',
            'name' => 'Кунг-фу',
            'max_rate' => '96',
        ]);
    }
}
