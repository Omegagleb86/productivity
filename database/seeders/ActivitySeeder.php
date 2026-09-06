<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activities')->insert([
            'person_id' => '1',
            'activity_form_id' => '1',
            'date' => '2005-05-06',
            'rate' => '60',
        ]);

        DB::table('activities')->insert([
            'person_id' => '2',
            'activity_form_id' => '2',
            'date' => '2006-05-16',
            'rate' => '30',
        ]);
    }
}
