<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryMapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'category_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '1',
            'category_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '1',
            'category_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);




        $param = [
            'user_id' => '2',
            'category_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '2',
            'category_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '2',
            'category_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);



        $param = [
            'user_id' => '3',
            'category_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '3',
            'category_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '3',
            'category_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);





        $param = [
            'user_id' => '4',
            'category_id' => '5',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '4',
            'category_id' => '6',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '4',
            'category_id' => '7',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);



        $param = [
            'user_id' => '5',
            'category_id' => '5',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '5',
            'category_id' => '6',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '5',
            'category_id' => '7',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);


        $param = [
            'user_id' => '6',
            'category_id' => '8',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);

        $param = [
            'user_id' => '6',
            'category_id' => '9',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('category_maps')->insert($param);
    }
}
