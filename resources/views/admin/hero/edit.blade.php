<x-layouts.admin :pageTitle="'Edit Hero Section'" :breadcrumb="'Kelola konten bagian utama halaman beranda'">

    <div class="max-w-3xl">

        {{-- Form Card --}}
        <div class="card-admin">
            <form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div>
                    <label for="title" class="form-label-sikatan">Judul Utama <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title"
                           value="{{ old('title', $hero->title) }}"
                           class="form-input-sikatan @error('title') border-red-400 @enderror"
                           placeholder="Masukkan judul hero section..." required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Subtitle --}}
                <div>
                    <label for="subtitle" class="form-label-sikatan">Sub-judul</label>
                    <textarea id="subtitle" name="subtitle" rows="3"
                              class="form-input-sikatan @error('subtitle') border-red-400 @enderror"
                              placeholder="Deskripsi singkat untuk hero section...">{{ old('subtitle', $hero->subtitle) }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">Anda bisa menggunakan HTML sederhana seperti &lt;em&gt;, &lt;strong&gt;</p>
                    @error('subtitle')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CTA Text & Link --}}
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label for="cta_text" class="form-label-sikatan">Teks Tombol CTA</label>
                        <input type="text" id="cta_text" name="cta_text"
                               value="{{ old('cta_text', $hero->cta_text) }}"
                               class="form-input-sikatan"
                               placeholder="Contoh: Jelajahi Panduan">
                        @error('cta_text') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="cta_link" class="form-label-sikatan">Link Tombol CTA</label>
                        <input type="text" id="cta_link" name="cta_link"
                               value="{{ old('cta_link', $hero->cta_link) }}"
                               class="form-input-sikatan"
                               placeholder="Contoh: #panduan atau /halaman">
                        @error('cta_link') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Image --}}
                <div>
                    <label class="form-label-sikatan">Gambar Hero</label>

                    @if($hero->image_path)
                        <div class="mb-3 relative rounded-xl overflow-hidden h-40 bg-gray-100">
                            <img src="{{ $hero->image_path }}" alt="Current Hero" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <span class="text-white text-sm font-medium bg-black/40 px-3 py-1 rounded-full">Gambar Saat Ini</span>
                            </div>
                        </div>
                    @endif

                    <div class="space-y-3">
                        <div>
                            <label for="image" class="text-xs text-gray-500 mb-1 block">Upload File Gambar (maks. 3MB)</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                   class="form-input-sikatan text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-forest-50 file:text-forest-700 hover:file:bg-forest-100">
                            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="image_url" class="text-xs text-gray-500 mb-1 block">Atau Masukkan URL Gambar</label>
                            <input type="url" id="image_url" name="image_url"
                                   value="{{ old('image_url') }}"
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
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn-secondary-sikatan">Batal</a>
                    <a href="{{ route('home') }}" target="_blank" class="ml-auto text-sm text-gray-400 hover:text-gray-600 transition-colors flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Preview Situs
                    </a>
                </div>

            </form>
        </div>

    </div>

</x-layouts.admin>
