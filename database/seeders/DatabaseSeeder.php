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
            UsersSeeder::class,
            RoleSeeder::class,
            ArticlesSeeder::class,
            AppealsSeeder::class,
            TagSeeder::class,
            ArticlTagSeeder::class,
            UserRoleSeeder::class,
        ]);
    }
}
