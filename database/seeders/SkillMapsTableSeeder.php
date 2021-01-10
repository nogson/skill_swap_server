<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillMapsTableSeeder extends Seeder
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
            'skill_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '1',
            'skill_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '1',
            'skill_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '2',
            'skill_id' => '4',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '2',
            'skill_id' => '5',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '2',
            'skill_id' => '6',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '3',
            'skill_id' => '5',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '3',
            'skill_id' => '10',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '4',
            'skill_id' => '7',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '4',
            'skill_id' => '8',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '4',
            'skill_id' => '9',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '5',
            'skill_id' => '10',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '5',
            'skill_id' => '11',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '5',
            'skill_id' => '12',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '6',
            'skill_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '6',
            'skill_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '6',
            'skill_id' => '13',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '6',
            'skill_id' => '14',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);

        $param = [
            'user_id' => '6',
            'skill_id' => '15',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('skill_maps')->insert($param);
    }
}
