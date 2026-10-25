<x-layouts.admin :pageTitle="'Pengaturan Situs'" :breadcrumb="'Kelola informasi kontak dan media sosial'">

    <div class="max-w-2xl">
        <div class="card-admin">
            <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Site Info --}}
                <div class="pb-5 border-b border-gray-100">
                    <h3 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-4 bg-forest-500 rounded-full"></span>
                        Informasi Situs
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label for="site_name" class="form-label-sikatan">Nama Situs <span class="text-red-500">*</span></label>
                            <input type="text" id="site_name" name="site_name"
                                   value="{{ old('site_name', $settings['site_name'] ?? '') }}"
                                   class="form-input-sikatan @error('site_name') border-red-400 @enderror"
                                   required>
                            @error('site_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="site_description" class="form-label-sikatan">Deskripsi Situs</label>
                            <textarea id="site_description" name="site_description" rows="2"
                                      class="form-input-sikatan">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                            @error('site_description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Contact --}}
                <div class="pb-5 border-b border-gray-100">
                    <h3 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-4 bg-amber-500 rounded-full"></span>
                        Informasi Kontak
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label for="contact_email" class="form-label-sikatan">Email</label>
                            <input type="email" id="contact_email" name="contact_email"
                                   value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                                   class="form-input-sikatan"
                                   placeholder="info@example.com">
                            @error('contact_email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="contact_phone" class="form-label-sikatan">Nomor Telepon</label>
                            <input type="text" id="contact_phone" name="contact_phone"
                                   value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                                   class="form-input-sikatan"
                                   placeholder="+62 812-xxxx-xxxx">
                        </div>
                        <div>
                            <label for="contact_address" class="form-label-sikatan">Alamat</label>
                            <textarea id="contact_address" name="contact_address" rows="2"
                                      class="form-input-sikatan"
                                      placeholder="Jl. Contoh No. 1, Kota, Indonesia">{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Social Media --}}
                <div>
                    <h3 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-4 bg-blue-500 rounded-full"></span>
                        Media Sosial
                    </h3>
                    <div class="space-y-4">
                        @foreach([
                            ['instagram','Instagram','https://instagram.com/username'],
                            ['facebook','Facebook','https://facebook.com/pagename'],
                            ['youtube','YouTube','https://youtube.com/@channel'],
                        ] as [$key, $label, $placeholder])
                            <div>
                                <label for="social_{{ $key }}" class="form-label-sikatan">{{ $label }}</label>
                                <input type="url" id="social_{{ $key }}" name="social_{{ $key }}"
                                       value="{{ old('social_' . $key, $settings['social_' . $key] ?? '') }}"
                                       class="form-input-sikatan"
                                       placeholder="{{ $placeholder }}">
                            </div>
                        @endforeach
                        <div>
                            <label for="social_whatsapp" class="form-label-sikatan">Nomor WhatsApp</label>
                            <input type="text" id="social_whatsapp" name="social_whatsapp"
                                   value="{{ old('social_whatsapp', $settings['social_whatsapp'] ?? '') }}"
                                   class="form-input-sikatan"
                                   placeholder="+62812345678 (format internasional)">
                            <p class="text-xs text-gray-400 mt-1">Gunakan format: +62xxxxxxxxxx (tanpa tanda strip)</p>
                        </div>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                    <button type="submit" class="btn-primary-sikatan">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Pengaturan
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn-secondary-sikatan">Batal</a>
                </div>

            </form>
        </div>
    </div>

</x-layouts.admin>
