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
            'mission_ar'=>'الشروط و الاحكام',
            'mission_en'=>'Terms And Conditions',

        ]);
    }
}
