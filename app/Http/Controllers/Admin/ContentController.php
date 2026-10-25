<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::latest()->paginate(10);
        return view('admin.contents.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.contents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|in:about,tips',
            'excerpt'  => 'nullable|string|max:500',
            'body'     => 'required|string',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'image_url'=> 'nullable|url',
        ]);

        $data = [
            'title'    => $request->title,
            'slug'     => Str::slug($request->title) . '-' . Str::random(5),
            'category' => $request->category,
            'excerpt'  => $request->excerpt,
            'body'     => $request->body,
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('contents', 'public');
            $data['image_path'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $data['image_path'] = $request->image_url;
        }

        Content::create($data);

        return redirect()->route('admin.contents.index')
            ->with('success', 'Konten berhasil ditambahkan!');
    }

    public function edit(Content $content)
    {
        return view('admin.contents.edit', compact('content'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|in:about,tips',
            'excerpt'  => 'nullable|string|max:500',
            'body'     => 'required|string',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'image_url'=> 'nullable|url',
        ]);

        $data = [
            'title'    => $request->title,
            'category' => $request->category,
            'excerpt'  => $request->excerpt,
            'body'     => $request->body,
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('contents', 'public');
            $data['image_path'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $data['image_path'] = $request->image_url;
        }

        $content->update($data);

        return redirect()->route('admin.contents.index')
            ->with('success', 'Konten berhasil diperbarui!');
    }

    public function destroy(Content $content)
    {
        $content->delete();

        return redirect()->route('admin.contents.index')
            ->with('success', 'Konten berhasil dihapus!');
    }
}
