<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(CateenSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SettignSeeder::class);
    }
}
