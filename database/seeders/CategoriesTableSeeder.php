<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'IT・プログラミング',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category')->insert($param);

        $param = [
            'name' => 'デザイン',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category')->insert($param);

        $param = [
            'name' => '動画・写真',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category')->insert($param);

        $param = [
            'name' => 'Webマーケティング',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category')->insert($param);
    }
}
