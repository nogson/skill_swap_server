<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTabaleSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SkillMapsTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(MessageMapsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
    }
}
