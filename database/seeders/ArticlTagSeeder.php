<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_tag')->insert([
            'article_id' => '1',
            'tag_id' => '1'
        ]);
        DB::table('article_tag')->insert([
            'article_id' => '1',
            'tag_id' => '2'
        ]);
        DB::table('article_tag')->insert([
            'article_id' => '1',
            'tag_id' => '3'
        ]);
        DB::table('article_tag')->insert([
            'article_id' => '2',
            'tag_id' => '1'
        ]);
        DB::table('article_tag')->insert([
            'article_id' => '2',
            'tag_id' => '2'
        ]);
    }
}
