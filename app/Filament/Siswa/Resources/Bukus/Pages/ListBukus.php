<?php

namespace App\Filament\Siswa\Resources\Bukus\Pages;

use App\Filament\Siswa\Resources\Bukus\BukuResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifcations\Notification;
use App\Models\Buku;
use App\Models\peminjaman;

class ListBukus extends ListRecords
{
    protected static string $resource = BukuResource::class;

    public function pinjam(int $bukuId): void {
        $user = auth()->user();
        $siswa = $user->siswa;

        if (! $siswa) {
            Notification::make()->title('Akun siswa tidak ditemukan')->danger()->send();
            return;
        }

        $buku = Buku::findOrFail($bukuId);

        if ($buku->stok < 1) {
            Notification::make()->title('Stok buku habis')->danger()-send();
            return;
        }

        peminjaman::create([
            'kode_peminjaman' => 'ABD-' . now()->format('Ymd' . '-' . str()->random(4)),
            'id_siswa' => $siswa->id,
            'id_admin' => null,
            'id_buku' => $buku->id,
            'tanggal_pinjam' => now()->toDateString(),
            'batas-pengembalian' => now()->addDays(7)->toDateString(),
            'status' => 'dipinjam',
            'denda' => 0
        ]);

        $buku->decrement('stcok');

        Notification::make()->title('Buku Berhasil dipinjam')->success()->send();
    }
}
