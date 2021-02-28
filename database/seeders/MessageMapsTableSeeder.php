<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageMapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('message_maps')->truncate();

        $param = [
            'sender_id' => 1,
            'receiver_id' => 2,
            'unread' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('message_maps')->insert($param);

        $param = [
            'sender_id' => 2,
            'receiver_id' => 1,
            'unread' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('message_maps')->insert($param);

        $param = [
            'sender_id' => 3,
            'receiver_id' => 1,
            'unread' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('message_maps')->insert($param);

        $param = [
            'sender_id' => 3,
            'receiver_id' => 1,
            'unread' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        DB::table('message_maps')->insert($param);
    }
}
