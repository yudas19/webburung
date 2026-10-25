<x-layouts.admin :pageTitle="'Dashboard Admin'" :breadcrumb="'Ringkasan aktivitas dan manajemen konten'">

    {{-- ═══ STAT CARDS ═══ --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

        @foreach([
            ['label'=>'Total Artikel Tips','value'=>$stats['total_tips'],'icon'=>'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z','color'=>'bg-forest-500','href'=>route('admin.contents.index')],
            ['label'=>'Foto Galeri','value'=>$stats['total_galleries'],'icon'=>'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z','color'=>'bg-amber-500','href'=>route('admin.galleries.index')],
            ['label'=>'Total Pengguna','value'=>$stats['total_users'],'icon'=>'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z','color'=>'bg-earth-500','href'=>'#'],
            ['label'=>'Konten About','value'=>$stats['total_about'],'icon'=>'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z','color'=>'bg-blue-500','href'=>route('admin.contents.index')],
        ] as $stat)
            <a href="{{ $stat['href'] }}" class="card-admin flex items-center gap-4 hover:shadow-md transition-all duration-200 group">
                <div class="w-12 h-12 rounded-xl {{ $stat['color'] }} flex items-center justify-center flex-shrink-0 shadow group-hover:scale-105 transition-transform duration-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $stat['value'] }}</p>
                    <p class="text-xs text-gray-500">{{ $stat['label'] }}</p>
                </div>
            </a>
        @endforeach

    </div>

    {{-- ═══ QUICK ACTIONS ═══ --}}
    <div class="grid lg:grid-cols-3 gap-6 mb-8">

        {{-- Quick Actions Card --}}
        <div class="card-admin">
            <h3 class="text-sm font-bold text-gray-800 mb-4 flex items-center gap-2">
                <span class="w-1.5 h-4 bg-forest-500 rounded-full"></span>
                Aksi Cepat
            </h3>
            <div class="space-y-3">
                <a href="{{ route('admin.hero.edit') }}" class="flex items-center gap-3 p-3 rounded-xl bg-forest-50 hover:bg-forest-100 text-forest-700 transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    <span class="text-sm font-medium">Edit Hero Section</span>
                    <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="{{ route('admin.contents.create') }}" class="flex items-center gap-3 p-3 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-700 transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span class="text-sm font-medium">Tambah Artikel Tips</span>
                    <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="{{ route('admin.galleries.create') }}" class="flex items-center gap-3 p-3 rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-700 transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    <span class="text-sm font-medium">Upload Foto Galeri</span>
                    <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 hover:bg-gray-100 text-gray-700 transition-all duration-200 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    </svg>
                    <span class="text-sm font-medium">Pengaturan Situs</span>
                    <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Hero Preview --}}
        <div class="card-admin">
            <h3 class="text-sm font-bold text-gray-800 mb-4 flex items-center gap-2">
                <span class="w-1.5 h-4 bg-amber-500 rounded-full"></span>
                Preview Hero
            </h3>
            @if($hero)
                <div class="relative rounded-xl overflow-hidden h-36 mb-3">
                    <img src="{{ $hero->image_path ?? 'https://placehold.co/400x200/2d6530/ffffff?text=Hero+Image' }}"
                         alt="Hero" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-forest-900/60 flex items-end p-3">
                        <p class="text-white font-bold text-sm leading-tight line-clamp-2" style="font-family:'Playfair Display',serif">
                            {{ $hero->title }}
                        </p>
                    </div>
                </div>
                <p class="text-xs text-gray-500 line-clamp-2 mb-3">{{ strip_tags($hero->subtitle) }}</p>
                <a href="{{ route('admin.hero.edit') }}" class="btn-primary-sikatan text-xs py-2 px-4 w-full justify-center">
                    Edit Hero Section
                </a>
            @else
                <div class="text-center py-6 text-gray-400">
                    <p class="text-sm">Belum ada hero section.</p>
                </div>
            @endif
        </div>

        {{-- Recent Galleries --}}
        <div class="card-admin">
            <h3 class="text-sm font-bold text-gray-800 mb-4 flex items-center justify-between">
                <span class="flex items-center gap-2">
                    <span class="w-1.5 h-4 bg-blue-500 rounded-full"></span>
                    Foto Terbaru
                </span>
                <a href="{{ route('admin.galleries.index') }}" class="text-xs text-forest-600 hover:text-forest-700">Lihat Semua</a>
            </h3>
            @if($recentGalleries->count())
                <div class="grid grid-cols-2 gap-2">
                    @foreach($recentGalleries as $photo)
                        <div class="relative rounded-xl overflow-hidden h-20 group">
                            <img src="{{ $photo->image_path }}" alt="{{ $photo->caption }}"
                                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-6 text-gray-400">
                    <p class="text-sm">Belum ada foto galeri.</p>
                </div>
            @endif
        </div>

    </div>

    {{-- ═══ RECENT ARTICLES ═══ --}}
    <div class="card-admin">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-sm font-bold text-gray-800 flex items-center gap-2">
                <span class="w-1.5 h-4 bg-forest-500 rounded-full"></span>
                Artikel Terbaru
            </h3>
            <a href="{{ route('admin.contents.index') }}" class="text-xs text-forest-600 hover:text-forest-700 font-medium">Kelola Semua →</a>
        </div>

        @if($recentTips->count())
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="text-left py-3 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Judul</th>
                            <th class="text-left py-3 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="text-left py-3 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Dibuat</th>
                            <th class="text-right py-3 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($recentTips as $tip)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="py-3 px-2">
                                    <div class="flex items-center gap-3">
                                        @if($tip->image_path)
                                            <img src="{{ $tip->image_path }}" alt="" class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                                        @endif
                                        <div class="min-w-0">
                                            <p class="font-medium text-gray-800 truncate max-w-xs">{{ $tip->title }}</p>
                                            <p class="text-xs text-gray-400 truncate max-w-xs">{{ Str::limit($tip->excerpt, 50) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-2">
                                    <span class="{{ $tip->category === 'tips' ? 'badge-tips' : 'badge-about' }}">
                                        {{ ucfirst($tip->category) }}
                                    </span>
                                </td>
                                <td class="py-3 px-2 text-gray-400 text-xs">{{ $tip->created_at->format('d M Y') }}</td>
                                <td class="py-3 px-2 text-right">
                                    <a href="{{ route('admin.contents.edit', $tip) }}"
                                       class="text-xs text-forest-600 hover:text-forest-700 font-medium mr-3">Edit</a>
                                    <form method="POST" action="{{ route('admin.contents.destroy', $tip) }}" class="inline"
                                          onsubmit="return confirm('Hapus artikel ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-xs text-red-500 hover:text-red-600 font-medium">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-10 text-gray-400">
                <p class="text-sm">Belum ada artikel. <a href="{{ route('admin.contents.create') }}" class="text-forest-600 hover:underline">Tambah sekarang</a></p>
            </div>
        @endif
    </div>

</x-layouts.admin>
