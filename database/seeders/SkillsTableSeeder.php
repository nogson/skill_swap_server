<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'IT・プログラミング スキル1',
            'category_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'IT・プログラミング スキル2',
            'category_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'IT・プログラミング スキル3',
            'category_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'IT・プログラミング スキル4',
            'category_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'デザイン スキル1',
            'category_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'デザイン スキル2',
            'category_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'デザイン スキル3',
            'category_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'デザイン スキル4',
            'category_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => '動画・写真 スキル1',
            'category_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => '動画・写真 スキル2',
            'category_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => '動画・写真 スキル3',
            'category_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => '動画・写真 スキル4',
            'category_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'Webマーケティング スキル1',
            'category_id' => '4',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'Webマーケティング スキル2',
            'category_id' => '4',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'Webマーケティング スキル3',
            'category_id' => '4',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);

        $param = [
            'name' => 'Webマーケティング スキル4',
            'category_id' => '4',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skills')->insert($param);
    }
}
