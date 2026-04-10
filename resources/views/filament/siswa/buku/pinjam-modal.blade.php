<div class="space-y-4">
    <div>
        <h3 class="font-semibold">{{ $record->judul }}</h3>
        <p>Pilih jumlah hari pinjam:</p>
        <div class="grid grid-cols-3 gap-2 mt-2">
            @foreach([3, 7, 14] as $hari)
            <label class="flex items-center p-2 border rounded cursor-pointer">
                <input type="radio" name="hari_pinjam" value-"{{ $hari }}" class="mr-2">
                <span>{{ $hari }} hari</span>
            </label>
            @endforeach
        </div>
    </div>
</div>