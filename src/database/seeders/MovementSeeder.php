<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movements')->insert([
            ['name' => 'Deadlift'],
            ['name' => 'Back Squat'],
            ['name' => 'Bench Press'],
        ]);
    }
}
