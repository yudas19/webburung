<x-layouts.admin :pageTitle="'Tambah Konten Baru'" :breadcrumb="'Buat artikel tips atau konten tentang Sikatan London'">

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
            <form method="POST" action="{{ route('admin.contents.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Title --}}
                <div>
                    <label for="title" class="form-label-sikatan">Judul Konten <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                           class="form-input-sikatan @error('title') border-red-400 @enderror"
                           placeholder="Masukkan judul artikel..." required>
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Category --}}
                <div>
                    <label for="category" class="form-label-sikatan">Kategori <span class="text-red-500">*</span></label>
                    <select id="category" name="category"
                            class="form-input-sikatan @error('category') border-red-400 @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="tips" {{ old('category') === 'tips' ? 'selected' : '' }}>Tips & Panduan Beternak</option>
                        <option value="about" {{ old('category') === 'about' ? 'selected' : '' }}>Tentang Sikatan London</option>
                    </select>
                    @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Excerpt --}}
                <div>
                    <label for="excerpt" class="form-label-sikatan">Ringkasan / Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="2"
                              class="form-input-sikatan @error('excerpt') border-red-400 @enderror"
                              placeholder="Ringkasan singkat artikel (maks. 500 karakter)...">{{ old('excerpt') }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">Ditampilkan pada card artikel di halaman utama</p>
                    @error('excerpt') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Body --}}
                <div>
                    <label for="body" class="form-label-sikatan">Isi Konten <span class="text-red-500">*</span></label>
                    <textarea id="body" name="body" rows="10"
                              class="form-input-sikatan @error('body') border-red-400 @enderror"
                              placeholder="Tulis isi konten di sini... (HTML diperbolehkan)" required>{{ old('body') }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">HTML diperbolehkan: &lt;h3&gt;, &lt;h4&gt;, &lt;p&gt;, &lt;strong&gt;, &lt;em&gt;, &lt;ul&gt;, &lt;li&gt;</p>
                    @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Image --}}
                <div>
                    <label class="form-label-sikatan">Gambar Artikel</label>
                    <div class="space-y-3">
                        <div>
                            <label for="image" class="text-xs text-gray-500 mb-1 block">Upload File (maks. 3MB)</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                   class="form-input-sikatan text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-forest-50 file:text-forest-700 hover:file:bg-forest-100">
                            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="image_url" class="text-xs text-gray-500 mb-1 block">Atau Masukkan URL Gambar</label>
                            <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                                   class="form-input-sikatan"
                                   placeholder="https://example.com/gambar.jpg">
                            @error('image_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                    <button type="submit" class="btn-primary-sikatan">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Konten
                    </button>
                    <a href="{{ route('admin.contents.index') }}" class="btn-secondary-sikatan">Batal</a>
                </div>

            </form>
        </div>
    </div>

</x-layouts.admin>
