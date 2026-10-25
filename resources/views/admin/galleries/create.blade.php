<x-layouts.admin :pageTitle="'Upload Foto Galeri'" :breadcrumb="'Tambah foto baru ke galeri Sikatan London'">

    <div class="max-w-xl">
        <div class="mb-5">
            <a href="{{ route('admin.galleries.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke galeri
            </a>
        </div>

        <div class="card-admin">
            <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data" class="space-y-5">
                @csrf

                {{-- Image Upload --}}
                <div>
                    <label class="form-label-sikatan">Gambar <span class="text-red-500">*</span></label>

                    {{-- Drop Zone Preview --}}
                    <div id="preview-container" class="hidden mb-3 relative rounded-xl overflow-hidden h-48 bg-gray-100">
                        <img id="image-preview" src="" alt="Preview" class="w-full h-full object-cover">
                        <button type="button" id="remove-preview"
                                class="absolute top-2 right-2 w-7 h-7 rounded-full bg-black/50 text-white flex items-center justify-center hover:bg-black/70 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <div class="space-y-3">
                        <div>
                            <label for="image" class="text-xs text-gray-500 mb-1 block">Upload File (maks. 5MB)</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                   class="form-input-sikatan text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-forest-50 file:text-forest-700 hover:file:bg-forest-100"
                                   onchange="previewImage(this)">
                            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="image_url" class="text-xs text-gray-500 mb-1 block">Atau Masukkan URL Gambar</label>
                            <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                                   class="form-input-sikatan"
                                   placeholder="https://example.com/gambar.jpg"
                                   oninput="previewUrl(this)">
                            @error('image_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Caption --}}
                <div>
                    <label for="caption" class="form-label-sikatan">Keterangan Foto</label>
                    <input type="text" id="caption" name="caption" value="{{ old('caption') }}"
                           class="form-input-sikatan"
                           placeholder="Contoh: Sikatan London jantan di habitat aslinya...">
                    @error('caption') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                    <button type="submit" class="btn-primary-sikatan">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        Upload ke Galeri
                    </button>
                    <a href="{{ route('admin.galleries.index') }}" class="btn-secondary-sikatan">Batal</a>
                </div>

            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const container = document.getElementById('preview-container');
            const preview   = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewUrl(input) {
            const container = document.getElementById('preview-container');
            const preview   = document.getElementById('image-preview');
            if (input.value) {
                preview.src = input.value;
                container.classList.remove('hidden');
            }
        }

        document.getElementById('remove-preview').addEventListener('click', () => {
            document.getElementById('preview-container').classList.add('hidden');
            document.getElementById('image').value = '';
            document.getElementById('image_url').value = '';
            document.getElementById('image-preview').src = '';
        });
    </script>

</x-layouts.admin>
