<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'email'=>'email@email.com',
            'phone'=>'00966258369147',
            'whatsapp'=>'00966258369147',
            'facebook'=>'https://www.facebook.com',
            'twitter'=>'https://www.twitter.com',
            'snapchat'=>'https://www.snapchat.com',
            'instagram'=>'https://www.instagram.com',
        ]);
    }
}
