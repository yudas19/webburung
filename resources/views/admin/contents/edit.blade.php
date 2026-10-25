<x-layouts.admin :pageTitle="'Edit Konten'" :breadcrumb="'Perbarui artikel: ' . Str::limit($content->title, 50)">

    <div class="max-w-3xl">
        <div class="mb-5">
            <a href="{{ route('admin.contents.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke daftar konten
            </a>
        </div>

        <div class="card-admin">
            <form method="POST" action="{{ route('admin.contents.update', $content) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div>
                    <label for="title" class="form-label-sikatan">Judul Konten <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title"
                           value="{{ old('title', $content->title) }}"
                           class="form-input-sikatan @error('title') border-red-400 @enderror"
                           required>
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Category --}}
                <div>
                    <label for="category" class="form-label-sikatan">Kategori <span class="text-red-500">*</span></label>
                    <select id="category" name="category"
                            class="form-input-sikatan @error('category') border-red-400 @enderror" required>
                        <option value="tips" {{ old('category', $content->category) === 'tips' ? 'selected' : '' }}>Tips & Panduan Beternak</option>
                        <option value="about" {{ old('category', $content->category) === 'about' ? 'selected' : '' }}>Tentang Sikatan London</option>
                    </select>
                    @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Excerpt --}}
                <div>
                    <label for="excerpt" class="form-label-sikatan">Ringkasan / Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="2"
                              class="form-input-sikatan">{{ old('excerpt', $content->excerpt) }}</textarea>
                    @error('excerpt') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Body --}}
                <div>
                    <label for="body" class="form-label-sikatan">Isi Konten <span class="text-red-500">*</span></label>
                    <textarea id="body" name="body" rows="12"
                              class="form-input-sikatan @error('body') border-red-400 @enderror"
                              required>{{ old('body', $content->body) }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">HTML diperbolehkan: &lt;h3&gt;, &lt;h4&gt;, &lt;p&gt;, &lt;strong&gt;, &lt;em&gt;, &lt;ul&gt;, &lt;li&gt;</p>
                    @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Image --}}
                <div>
                    <label class="form-label-sikatan">Gambar Artikel</label>

                    @if($content->image_path)
                        <div class="mb-3 relative rounded-xl overflow-hidden h-36 bg-gray-100">
                            <img src="{{ $content->image_path }}" alt="" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <span class="text-white text-xs font-medium bg-black/40 px-3 py-1 rounded-full">Gambar Saat Ini</span>
                            </div>
                        </div>
                    @endif

                    <div class="space-y-3">
                        <div>
                            <label for="image" class="text-xs text-gray-500 mb-1 block">Upload File Baru (maks. 3MB)</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                   class="form-input-sikatan text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-forest-50 file:text-forest-700 hover:file:bg-forest-100">
                        </div>
                        <div>
                            <label for="image_url" class="text-xs text-gray-500 mb-1 block">Atau Ganti dengan URL Gambar</label>
                            <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                                   class="form-input-sikatan"
                                   placeholder="https://example.com/gambar.jpg">
                        </div>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                    <button type="submit" class="btn-primary-sikatan">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.contents.index') }}" class="btn-secondary-sikatan">Batal</a>
                    <form method="POST" action="{{ route('admin.contents.destroy', $content) }}" class="ml-auto"
                          onsubmit="return confirm('Yakin ingin menghapus konten ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-red-600 border-2 border-red-200 hover:bg-red-50 transition-all duration-200 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Konten
                        </button>
                    </form>
                </div>

            </form>
        </div>
    </div>

</x-layouts.admin>
