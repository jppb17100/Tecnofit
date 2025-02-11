<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder para Users
        DB::table('users')->insert([
            ['name' => 'João'],
            ['name' => 'José'],
            ['name' => 'Paulo']
        ]);
    }
}
