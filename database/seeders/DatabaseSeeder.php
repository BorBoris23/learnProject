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
            RolesSeeder::class,
            ArticlesSeeder::class,
            AppealsSeeder::class,
            TagsSeeder::class,
            TaggeableSeeder::class,
            UserRoleSeeder::class,
            CommentsSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
