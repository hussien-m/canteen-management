<?php

namespace Database\Seeders;

use App\Models\Canteen;

use Illuminate\Database\Seeder;

class CateenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Canteen::create([
            'name' => 'مقصف الاسراء',
            'school_id' => 1,
        ]);

        Canteen::create([

            'name' => 'مقصف الامراء',
            'school_id' => 2,
        ]);
    }
}
