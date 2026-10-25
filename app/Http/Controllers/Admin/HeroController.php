<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * Show form to edit hero section.
     */
    public function edit()
    {
        $hero = HeroSection::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Pesona & Edukasi Burung Sikatan London',
                'subtitle' => 'Komunitas pecinta dan penangkar burung Sikatan London (Cyornis tickelliae). Temukan panduan perawatan, teknik breeding, hingga karakter suara khas kicaunnya yang merdu.',
                'image_path' => 'https://images.unsplash.com/photo-1444464666168-49d633b86797?auto=format&fit=crop&w=1200&q=80',
                'cta_text' => 'Jelajahi Panduan Beternak',
                'cta_link' => '#panduan',
            ]
        );

        return view('admin.hero.edit', compact('hero'));
    }

    /**
     * Update hero section in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'image_url' => 'nullable|url',
        ]);

        $hero = HeroSection::firstOrCreate(['id' => 1]);

        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'cta_text' => $request->cta_text,
            'cta_link' => $request->cta_link,
        ];

        // Handle file upload or image URL
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('heroes', 'public');
            $data['image_path'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $data['image_path'] = $request->image_url;
        }

        $hero->update($data);

        return redirect()->route('admin.hero.edit')->with('success', 'Hero section berhasil diperbarui!');
    }
}
