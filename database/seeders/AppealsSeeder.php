<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appeals')->insert([
            'email' => 'email@email1.ru',
            'appealText' => 'appealText1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('appeals')->insert([
            'email' => 'email@email2.ru',
            'appealText' => 'appealText2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('appeals')->insert([
            'email' => 'email@email3.ru',
            'appealText' => 'appealText3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('appeals')->insert([
            'email' => 'email@email4.ru',
            'appealText' => 'appealText4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
