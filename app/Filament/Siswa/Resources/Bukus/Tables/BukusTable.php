<?php

namespace App\Filament\Siswa\Resources\Bukus\Tables;

use App\Models\Peminjaman;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;

class BukusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            Stack::make([ViewColumn::make('card')
                ->view('filament.siswa.buku.card'),
                ])
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 4,
            ])
            ->deferLoading()
            ->paginated(12)
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('pinjam')
                ->label('Pinjam Buku')
                ->modalHeading('Peminjaman Buku')
                ->modalContent(fn ($record) => view('filament.siswa.buku.pinjam-modal', ['record' => $record]))
                ->modalSubmitActionLabel('Lanjutkan Peminjaman')
                ->action(function ($record) {
                    $siswa = auth()->user()->siswa;
                    Peminjaman::create([
                        'kode_peminjaman' => 'ABD-' . now()->format('Ymd-His') . '-' . rand(1000, 9999),
                        'id_siswa' => $siswa->id,
                        'id_admin' => 1,
                        'id_buku' => $record->id,
                        'tanggal_pinjam' => now(),
                        'batas_pengembalian' => now()->addDays(7),
                        'status' => 'dipinjam',
                        'denda' => 0
                    ]);
                    Notification::make()->success()->title('Peminjaman Berhasil')->send();
                })
            ])
            ->toolbarActions([
            ]);
    }
}
