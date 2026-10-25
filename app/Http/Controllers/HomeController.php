<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Gallery;
use App\Models\HeroSection;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the public landing page.
     */
    public function index()
    {
        $hero = HeroSection::first() ?? new HeroSection([
            'title' => 'Pesona & Edukasi Burung Sikatan London',
            'subtitle' => 'Komunitas pecinta dan penangkar burung Sikatan London (Cyornis tickelliae). Temukan panduan perawatan, teknik breeding, hingga karakter suara khas kicaunnya yang merdu.',
            'image_path' => 'https://images.unsplash.com/photo-1444464666168-49d633b86797?auto=format&fit=crop&w=1200&q=80',
            'cta_text' => 'Jelajahi Panduan Beternak',
            'cta_link' => '#panduan',
        ]);

        $about = Content::where('category', 'about')->first();
        $tips = Content::where('category', 'tips')->latest()->get();
        $galleries = Gallery::latest()->get();

        // Retrieve settings as key-value pairs
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        return view('home', compact('hero', 'about', 'tips', 'galleries', 'settings'));
    }
}
