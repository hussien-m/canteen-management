<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => "زحمة",
            'site_status' => "on",
            'message_site_status' => "الموقع مغلق للصيانة",
            'meta_tags' => "meta_tags",
            'meta_description' => "meta_description",
            'tiwtter' => "tiwtter",
            'facebook' => "facebook",
            'instagram' => "instagram",
        ]);
    }
}
