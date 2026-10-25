<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'image_path' => 'https://images.unsplash.com/photo-1444464666168-49d633b86797?auto=format&fit=crop&w=600&q=80',
                'caption'    => 'Burung Sikatan London jantan dewasa dengan bulu biru yang memukau',
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?auto=format&fit=crop&w=600&q=80',
                'caption'    => 'Sikatan London di habitat alaminya di antara pepohonan tropis',
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1555169062-013468b47731?auto=format&fit=crop&w=600&q=80',
                'caption'    => 'Sepasang indukan Sikatan London dalam kandang penangkaran',
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1471286174890-9c112ac6f1d4?auto=format&fit=crop&w=600&q=80',
                'caption'    => 'Piyik Sikatan London baru menetas di sarang alami',
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1416339442236-8ceb164046f8?auto=format&fit=crop&w=600&q=80',
                'caption'    => 'Komunitas peternak Sikatan London dalam gathering tahunan',
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?auto=format&fit=crop&w=600&q=80',
                'caption'    => 'Keindahan alam hutan tropis habitat asli Sikatan London',
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
