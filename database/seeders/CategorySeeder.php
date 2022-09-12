<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\MainCategory;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        MainCategory::create([

            'name' => 'مشروبات باردة'
        ]);

        MainCategory::create([

            'name' => 'مشروبات ساخنة'
        ]);

        MainCategory::create([

            'name' => 'وجبات سريعة'
        ]);

        MainCategory::create([

            'name' => 'وجبات كاملة'
        ]);


        Category::create([

            'name' => 'كولا',
            'main_category_id' =>1,
        ]);

        Category::create([
            'name' => 'عصير',
            'main_category_id' =>1,
        ]);

        Category::create([
            'name' => 'مياه',
            'main_category_id' =>1,
        ]);

        Category::create([
            'name' => 'شاي',
            'main_category_id' =>2,
        ]);

        Category::create([
            'name' => 'حليب',
            'main_category_id' =>2,
        ]);

        Category::create([
            'name' => 'قهوة',
            'main_category_id' =>2,
        ]);

        Category::create([
            'name' => 'نسكافيه',
            'main_category_id' =>2,
        ]);



    }
}
