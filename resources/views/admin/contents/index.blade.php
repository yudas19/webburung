<x-layouts.admin :pageTitle="'Kelola Konten'" :breadcrumb="'Daftar artikel tips dan konten tentang Sikatan London'">

    {{-- Toolbar --}}
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div class="flex gap-3">
            <a href="{{ route('admin.contents.create') }}" class="btn-primary-sikatan text-sm py-2 px-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Konten
            </a>
        </div>
        <div class="flex items-center gap-2 text-sm text-gray-500">
            Total: <span class="font-semibold text-gray-800">{{ $contents->total() }}</span> konten
        </div>
    </div>

    {{-- Table --}}
    <div class="card-admin p-0 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="text-left py-4 px-5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Konten</th>
                        <th class="text-left py-4 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="text-left py-4 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Dibuat</th>
                        <th class="text-right py-4 px-5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($contents as $content)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-4">
                                    @if($content->image_path)
                                        <img src="{{ $content->image_path }}" alt=""
                                             class="w-12 h-12 rounded-xl object-cover flex-shrink-0">
                                    @else
                                        <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="font-semibold text-gray-800 mb-0.5 truncate max-w-sm">{{ $content->title }}</p>
                                        <p class="text-xs text-gray-400 truncate max-w-sm">{{ Str::limit($content->excerpt, 70) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="{{ $content->category === 'tips' ? 'badge-tips' : 'badge-about' }}">
                                    {{ $content->category === 'tips' ? 'Tips & Panduan' : 'Tentang' }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-gray-400 text-xs whitespace-nowrap">
                                {{ $content->created_at->format('d M Y') }}
                            </td>
                            <td class="py-4 px-5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.contents.edit', $content) }}"
                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-forest-50 text-forest-700 hover:bg-forest-100 text-xs font-medium transition-colors duration-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.contents.destroy', $content) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus konten ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 text-xs font-medium transition-colors duration-200">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-16 text-center">
                                <div class="flex flex-col items-center gap-3 text-gray-400">
                                    <svg class="w-14 h-14 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-sm">Belum ada konten. <a href="{{ route('admin.contents.create') }}" class="text-forest-600 hover:underline font-medium">Tambah sekarang</a></p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($contents->hasPages())
            <div class="px-5 py-4 border-t border-gray-100">
                {{ $contents->links() }}
            </div>
        @endif
    </div>

</x-layouts.admin>
