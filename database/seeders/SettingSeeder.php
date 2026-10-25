<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name'        => 'Komunitas Sikatan London Indonesia',
            'site_description' => 'Platform edukasi dan komunitas peternak burung Sikatan London (Cyornis tickelliae) terpercaya di Indonesia.',
            'contact_email'    => 'info@sikatan.test',
            'contact_phone'    => '+62 812-3456-7890',
            'contact_address'  => 'Jl. Alam Hijau No. 88, Jakarta Selatan, Indonesia',
            'social_instagram' => 'https://instagram.com/sikatanlondon.id',
            'social_facebook'  => 'https://facebook.com/sikatanlondonindonesia',
            'social_youtube'   => 'https://youtube.com/@sikatanlondonid',
            'social_whatsapp'  => '+62812345678',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
