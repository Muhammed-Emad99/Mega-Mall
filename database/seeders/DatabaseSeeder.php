<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(class: [
            //StartingPageSeeder::class,
            //CategorySeeder::class,
            //ProductSeeder::class,
            //CountryKeySeeder::class,
            CountryStateCityTableSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminsSeeder::class
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
