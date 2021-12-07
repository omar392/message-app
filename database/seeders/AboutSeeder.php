<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'about_ar'=>'من نحن',
            'about_en'=>'about_en',
            'mission_ar'=>'الرسالة',
            'mission_en'=>'mission_en',
            'vision_ar'=>'الرؤية',
            'vision_en'=>'vision_en',
        ]);
    }
}
