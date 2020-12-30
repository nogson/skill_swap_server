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
            'name' => 'デザイン',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('categories')->insert($param);

        $param = [
            'name' => 'javascript',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('categories')->insert($param);

        $param = [
            'name' => 'vue',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('categories')->insert($param);

        $param = [
            'name' => 'php',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('categories')->insert($param);

        $param = [
            'name' => 'AWS',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('categories')->insert($param);


        $param = [
            'name' => 'Ruby',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('categories')->insert($param);

        $param = [
            'name' => 'サウナ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('categories')->insert($param);


        $param = [
            'name' => 'Android',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('categories')->insert($param);


        $param = [
            'name' => 'Kotorin',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('categories')->insert($param);
    }
}
