<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $this->call(PustakaSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     GuideSeeder::class,
        // ]);

        /**
         * Seed the application's database.
         */

        // $this->call([
        //     EresourcesInternalSeeder::class,
        // ]);

        // $this->call([
        //     PerpustakaanSeeder::class,
        // ]);

        $this->call([
            GuideSeeder::class,
            EresourcesInternalSeeder::class,
            PerpustakaanSeeder::class,
            FacultySeeder::class,
            MajorSeeder::class,
        ]);
    }
}
