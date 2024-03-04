<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StartingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 3 ; $i++){
            DB::table('starting_pages')->insert([
                'description' => Str::random(100),
                'image' => Str::random(5).'.jpeg',
            ]);
        }
    }
}
