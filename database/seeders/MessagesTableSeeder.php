<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('messages')->truncate();

        $param = [
            'message_map_id' => 1,
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'こんにちは。元気ですか。私は元気です。よろしく。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('messages')->insert($param);

        $param = [
            'message_map_id' => 2,
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'げんきですよ。ありがとう。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('messages')->insert($param);

        $param = [
            'message_map_id' => 3,
            'sender_id' => 3,
            'receiver_id' => 1,
            'message' => 'こんにちは。はじめまして。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('messages')->insert($param);

        $param = [
            'message_map_id' => 4,
            'sender_id' => 3,
            'receiver_id' => 1,
            'message' => 'よろしくおねがいします',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('messages')->insert($param);
    }
}
