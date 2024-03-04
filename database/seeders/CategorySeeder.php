<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Foods','Gift','Fashion','Electronics','Beauty','Sports','Tools','Cloths','Drinks','Shoes'];
        for ($i = 0; $i < count($categories); $i++){
            DB::table('categories')->insert([
                'title' => $categories[$i],
                'description' => Str::random(30),
                'image' => strtolower($categories[$i]).'.jpeg',
            ]);
        }
    }
}
