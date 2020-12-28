<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UsersTabaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'taro',
            'email' => 'taro@example.com',
            'password' => Hash::make('test'),
            'profile' => '私はプログラミング勉強中です。だれかバックエンドを教えて下さい。今はLaravelを勉強しています。AWSも勉強していますが難しいです。',
            'address' => '東京都',
            'strong' =>'デザイン,javascript,vue',
            'strong_description' => 'デザインはそこそこできます',
            'weak' => 'PHP,AWS',
            'weak_description' => 'バックエンドが苦手です',
            'link' => 'https://yahoo.co.jp',
            'thumbnail'=> 'https://skill-swap.s3-ap-northeast-1.amazonaws.com/thumbnail/user_1.png'

        ];

        DB::table('users') -> insert($param);

        $param = [
            'name' => 'kissaka',
            'email' => 'kissaka@example.com',
            'password' => Hash::make('test'),
            'profile' => '細々と商い。細さは一定ではない。デザイナー＆企画屋さん。肉とランニングを愛する暗黒陸上部を主催。好きな食べ物はカロリー。',
            'address' => '東京都',
            'strong' =>'デザイン,javascript,vue',
            'strong_description' => 'デザインはそこそこできます',
            'weak' => 'PHP,AWS',
            'weak_description' => 'バックエンドが苦手です',
            'link' => 'https://yahoo.co.jp',
            'thumbnail'=> 'https://skill-swap.s3-ap-northeast-1.amazonaws.com/thumbnail/user_2.png'

        ];

        DB::table('users') -> insert($param);

        $param = [
            'name' => 'watanabetetsuya',
            'email' => 'watanabetetsuya@example.com',
            'password' => Hash::make('test'),
            'profile' => '作家 経済評論家 渡邉哲也です。本業は企業経営です。 メルマガは http://foomii.com/00049 執筆、出演、講演の依頼は info@watanabetetsuya.info で受け付けております。お気軽に',
            'address' => '東京都',
            'strong' =>'デザイン,javascript,vue',
            'strong_description' => 'デザインはそこそこできます',
            'weak' => 'PHP,AWS',
            'weak_description' => 'バックエンドが苦手です',
            'link' => 'https://yahoo.co.jp',
            'thumbnail'=> 'https://skill-swap.s3-ap-northeast-1.amazonaws.com/thumbnail/user_3.png'

        ];

        DB::table('users') -> insert($param);

        $param = [
            'name' => 'absfff',
            'email' => 'absfffa@example.com',
            'password' => Hash::make('test'),
            'profile' => 'インフラエンジニア/SRE http://enigmo.co.jp @stylehaus_jp@BUYMA AWS/Ruby/サウナ/ロードバイク/Bianchi/スケボー/アニメ/漫画/映画/猫/犬/登山/銭湯/温泉/T.M.Revolution/GLAY/LArc/LUNA SEA/hide/X/境川CR/湘南/江の島',
            'address' => '東京都',
            'strong' =>'AWS,Ruby,サウナ',
            'strong_description' => 'インフラエンジニアです',
            'weak' => 'マーケティング',
            'weak_description' => '',
            'link' => 'https://yahoo.co.jp',
            'thumbnail'=> 'https://skill-swap.s3-ap-northeast-1.amazonaws.com/thumbnail/user_3.png'
        ];

        DB::table('users') -> insert($param);


        $param = [
            'name' => 'tkihira',
            'email' => 'tkihira@example.com',
            'password' => Hash::make('test'),
            'profile' => 'スマートニュース株式会社で働いています。GO GLOBAL meetup groupの管理人もしております。',
            'address' => '東京都',
            'strong' =>'AWS,Ruby,サウナ',
            'strong_description' => 'インフラエンジニアです',
            'weak' => 'マーケティング',
            'weak_description' => '',
            'link' => 'https://yahoo.co.jp',
            'thumbnail'=> 'https://skill-swap.s3-ap-northeast-1.amazonaws.com/thumbnail/user_4.png'
        ];

        DB::table('users') -> insert($param);

        $param = [
            'name' => 'sobachanko',
            'email' => 'sobachanko@example.com',
            'password' => Hash::make('test'),
            'profile' => 'お酒が大好きなプログラマーです。Androidアプリ作ったり、お酒飲んだりしてます。ハゲのサラブレッド。',
            'address' => '東京都',
            'strong' =>'Android,Kotorin',
            'strong_description' => 'Androidエンジニアです',
            'weak' => 'iOS',
            'weak_description' => 'iOSも頑張りたいです',
            'link' => 'https://yahoo.co.jp',
            'thumbnail'=> 'https://skill-swap.s3-ap-northeast-1.amazonaws.com/thumbnail/user_5.png'
        ];

        DB::table('users') -> insert($param);
    }
}
