<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'title'     => 'Pesona & Edukasi Burung Sikatan London',
                'subtitle'  => 'Komunitas pecinta dan penangkar burung Sikatan London (<em>Cyornis tickelliae</em>). Temukan panduan perawatan, teknik breeding, hingga karakter suara khas kicaunnya yang merdu dan memukau.',
                'image_path'=> 'https://images.unsplash.com/photo-1444464666168-49d633b86797?auto=format&fit=crop&w=1200&q=80',
                'cta_text'  => 'Jelajahi Panduan Beternak',
                'cta_link'  => '#panduan',
            ]
        );
    }
}
