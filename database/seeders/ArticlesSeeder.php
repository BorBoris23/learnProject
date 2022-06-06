<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'header' => 'header1',
            'description' => 'description1',
            'content' => 'content1',
            'uniqueCode' => 'uniqueCode1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('articles')->insert([
            'header' => 'header2',
            'description' => 'description2',
            'content' => 'content2',
            'uniqueCode' => 'uniqueCode2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('articles')->insert([
            'header' => 'header3',
            'description' => 'description3',
            'content' => 'content3',
            'uniqueCode' => 'uniqueCode3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('articles')->insert([
            'header' => 'header4',
            'description' => 'description4',
            'content' => 'content4',
            'uniqueCode' => 'uniqueCode4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('articles')->insert([
            'header' => 'header5',
            'description' => 'description5',
            'content' => 'content5',
            'uniqueCode' => 'uniqueCode5',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
