<x-layouts.admin :pageTitle="'Galeri Foto'" :breadcrumb="'Kelola foto-foto burung Sikatan London'">

    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <a href="{{ route('admin.galleries.create') }}" class="btn-primary-sikatan text-sm py-2 px-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
            </svg>
            Upload Foto Baru
        </a>
        <span class="text-sm text-gray-500">Total: <strong class="text-gray-800">{{ $galleries->total() }}</strong> foto</span>
    </div>

    @if($galleries->count())
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($galleries as $photo)
                <div class="card-admin p-0 overflow-hidden group">
                    {{-- Image --}}
                    <div class="relative h-44 overflow-hidden">
                        <img src="{{ $photo->image_path }}" alt="{{ $photo->caption }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    {{-- Caption + Delete --}}
                    <div class="p-3">
                        <p class="text-xs text-gray-700 font-medium line-clamp-2 mb-3 min-h-[2rem]">
                            {{ $photo->caption ?? 'Tanpa keterangan' }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-400">{{ $photo->created_at->format('d M Y') }}</span>
                            <form method="POST" action="{{ route('admin.galleries.destroy', $photo) }}"
                                  onsubmit="return confirm('Hapus foto ini dari galeri?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 text-xs font-medium transition-colors duration-200">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($galleries->hasPages())
            <div class="mt-6">{{ $galleries->links() }}</div>
        @endif
    @else
        <div class="card-admin text-center py-16">
            <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-gray-500 mb-4">Belum ada foto di galeri.</p>
            <a href="{{ route('admin.galleries.create') }}" class="btn-primary-sikatan">Upload Foto Pertama</a>
        </div>
    @endif

</x-layouts.admin>
