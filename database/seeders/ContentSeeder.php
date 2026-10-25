<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Tentang Sikatan London
        Content::updateOrCreate(
            ['slug' => 'tentang-sikatan-london'],
            [
                'title'      => 'Tentang Burung Sikatan London',
                'slug'       => 'tentang-sikatan-london',
                'category'   => 'about',
                'excerpt'    => 'Burung Sikatan London (Cyornis tickelliae) adalah salah satu jenis burung kicau yang memiliki suara merdu dan penampilan eksotis yang memikat hati para penggemar burung.',
                'body'       => '<h3>Ciri-ciri Fisik</h3><p>Burung Sikatan London jantan memiliki bulu berwarna biru terang di bagian atas tubuh dengan perpaduan oranye-karat yang mencolok di dada dan sisi tubuhnya. Betina umumnya berwarna coklat-zaitun yang lebih kalem. Panjang tubuhnya berkisar 14-15 cm.</p><h3>Habitat Alami</h3><p>Burung ini berasal dari wilayah Asia Selatan dan Asia Tenggara, khususnya India, Bangladesh, Sri Lanka, hingga Semenanjung Melayu. Mereka hidup di hutan-hutan tropis yang lebat, pinggiran hutan, serta daerah bervegetasi padat.</p><h3>Karakteristik Suara</h3><p>Suara kicauan Sikatan London terkenal merdu, variatif, dan lantang. Burung jantan sangat aktif berkicau terutama di pagi hari. Variasi lagu dan kemampuan meniru suara lingkungan menjadikannya burung lomba yang diminati.</p><h3>Karakter & Perilaku</h3><p>Sikatan London dikenal sebagai burung yang aktif, lincah, dan agresif terhadap sesama jenis. Mereka teritorial dan suka berpindah-pindah dari dahan satu ke dahan lainnya. Dalam penangkaran, burung ini perlu kandang yang cukup luas dan stimulasi mental yang memadai.</p>',
                'image_path' => 'https://images.unsplash.com/photo-1555169062-013468b47731?auto=format&fit=crop&w=800&q=80',
            ]
        );

        // Tips 1
        Content::updateOrCreate(
            ['slug' => 'panduan-perawatan-harian-sikatan-london'],
            [
                'title'      => 'Panduan Perawatan Harian Burung Sikatan London',
                'slug'       => 'panduan-perawatan-harian-sikatan-london',
                'category'   => 'tips',
                'excerpt'    => 'Perawatan harian yang konsisten adalah kunci keberhasilan dalam beternak Sikatan London. Pelajari rutinitas penting mulai dari pemberian pakan, mandi, hingga penjemuran.',
                'body'       => '<p>Perawatan harian Sikatan London memerlukan ketelatenan dan konsistensi. Berikut panduan lengkapnya:</p><h4>1. Pemberian Pakan</h4><p>Pakan utama berupa voer berkualitas tinggi yang kaya protein. Tambahkan pakan ekstra berupa jangkrik kecil (2-3 ekor/hari), ulat hongkong, atau kroto segar untuk meningkatkan birahi dan stamina.</p><h4>2. Mandi Pagi</h4><p>Semprotkan air hangat pada pukul 07.00-08.00 pagi. Pastikan air bersih dan tidak terlalu dingin. Mandi rutin membantu menjaga kebersihan bulu dan merangsang birahi burung.</p><h4>3. Penjemuran</h4><p>Jemur burung 30-60 menit di bawah sinar matahari pagi (pukul 07.30-09.00). Hindari penjemuran berlebihan karena bisa menyebabkan stres.</p><h4>4. Kebersihan Kandang</h4><p>Bersihkan kandang setiap hari, ganti alas kandang, dan sterilkan tempat makan-minum. Kandang yang bersih mencegah penyakit dan membuat burung tetap nyaman.</p>',
                'image_path' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?auto=format&fit=crop&w=800&q=80',
            ]
        );

        // Tips 2
        Content::updateOrCreate(
            ['slug' => 'teknik-breeding-sikatan-london-di-penangkaran'],
            [
                'title'      => 'Teknik Breeding Sikatan London di Penangkaran',
                'slug'       => 'teknik-breeding-sikatan-london-di-penangkaran',
                'category'   => 'tips',
                'excerpt'    => 'Proses breeding Sikatan London membutuhkan persiapan yang matang. Dari pemilihan indukan berkualitas, setup kandang breeding, hingga perawatan piyik yang baru menetas.',
                'body'       => '<p>Breeding Sikatan London yang sukses memerlukan pengetahuan dan persiapan yang matang:</p><h4>1. Pemilihan Indukan</h4><p>Pilih indukan jantan dan betina yang sehat, aktif, dan tidak cacat fisik. Pastikan keduanya sudah berusia minimal 1 tahun dan sudah birahi penuh.</p><h4>2. Setup Kandang Breeding</h4><p>Gunakan kandang berukuran minimal 60x40x40 cm per pasang. Sediakan sarang buatan dari sabut kelapa atau rumput kering. Pastikan kandang tenang dan jauh dari gangguan.</p><h4>3. Proses Perjodohan</h4><p>Perkenalkan pasangan secara bertahap. Tempatkan kandang jantan dan betina bersebelahan selama 1-2 minggu sebelum disatukan. Amati tanda-tanda kecocokan seperti saling berkicau dan mendekati sekat kandang.</p><h4>4. Perawatan Telur & Piyik</h4><p>Betina biasanya bertelur 3-4 butir dan mengerami selama 13-15 hari. Saat piyik menetas, tingkatkan pasokan pakan hidup (jangkrik, kroto) untuk memastikan perkembangan yang optimal.</p>',
                'image_path' => 'https://images.unsplash.com/photo-1471286174890-9c112ac6f1d4?auto=format&fit=crop&w=800&q=80',
            ]
        );

        // Tips 3
        Content::updateOrCreate(
            ['slug' => 'mengatasi-masalah-umum-dalam-perawatan-sikatan-london'],
            [
                'title'      => 'Mengatasi Masalah Umum Perawatan Sikatan London',
                'slug'       => 'mengatasi-masalah-umum-dalam-perawatan-sikatan-london',
                'category'   => 'tips',
                'excerpt'    => 'Setiap peternak pasti pernah menghadapi masalah dalam merawat Sikatan London. Artikel ini membahas masalah umum dan cara efektif mengatasinya.',
                'body'       => '<p>Beberapa masalah umum yang sering dihadapi peternak Sikatan London dan cara mengatasinya:</p><h4>1. Burung Macet Bunyi</h4><p>Penyebab: stres, sakit, atau pergantian lingkungan. Solusi: berikan extra fooding, pastikan kandang tenang, dan hindari suara bising berlebih.</p><h4>2. Bulu Rontok Berlebihan</h4><p>Bisa jadi tanda molting alami atau infeksi parasit. Berikan vitamin dan pastikan kebersihan kandang terjaga. Konsultasikan ke dokter hewan jika berlanjut.</p><h4>3. Nafsu Makan Menurun</h4><p>Coba variasikan pakan, tambahkan suplemen, dan pastikan suhu lingkungan nyaman (22-28°C). Periksa kondisi air minum dan pastikan selalu segar.</p>',
                'image_path' => 'https://images.unsplash.com/photo-1416339442236-8ceb164046f8?auto=format&fit=crop&w=800&q=80',
            ]
        );
    }
}
