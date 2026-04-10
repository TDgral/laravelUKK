@php
    /** @var \App\Models\Buku $record */
@endphp

<div class="max-w-sm mx-auto bg-white shadow-sm rounded-xl overflow-hidden border border-gray-200">
    @if (! empty($record->cover_image))
        <img src="{{ $record->cover_image }}" alt="{{ $record->judul }}" class="h-40 w-full object-cover">
        
    @else
    <div class="h-40 w-full bg-gray-100 flex items-center justify-center text-sm text-gray-400">
        Tidak ada gambar
    </div>

    @endif

    <div class="p-4 flex flex-col gap-2">
        <h3 class="font-semibold text-sm line-clamp">
            {{ $record->judul }}
        </h3>

        <p class="text-xs text-gray-600 line-clamp-3">
            {{ $record->deskripsi }}
        </p>

        <div class="mt-2 flex items-center justify-between text-xs">
            <span class="font-medium">Stok:</span>
            <span class="{{ $record->stok > 0 ? 'text-emerald-600' : 'text-red-500'}}">{{ $record->stok > 0 ? $record->stok . ' Tersedia' : 'Habis'}}</span>
        </div>

        <div class="mt-3 flex justify-end">
            @if ($record->stok > 0)
                <x-filament::button wire:click="pinjam({{ $record->id }})" size="xs">Pinjam</x-filament::button>
        
            @else
                <span class="text-[11px] text-gray-400 italic">Tidak dapat dipinjam</span>

            @endif
        </div>
    </div>
</div>