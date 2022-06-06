<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ArticlesSeeder::class,
            AppealsSeeder::class,
            TagSeeder::class,
            ArticlTagSeeder::class
        ]);
    }
}
