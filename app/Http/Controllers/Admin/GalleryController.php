<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption'   => 'nullable|string|max:255',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'image_url' => 'nullable|url',
        ]);

        $data = [
            'caption' => $request->caption,
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('galleries', 'public');
            $data['image_path'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $data['image_path'] = $request->image_url;
        } else {
            return back()->withErrors(['image' => 'Harap unggah gambar atau masukkan URL gambar.'])->withInput();
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto berhasil dihapus dari galeri!');
    }
}
