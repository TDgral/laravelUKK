<?php

namespace App\Filament\Siswa\Resources\Peminjamen\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PeminjamanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_peminjaman')
                    ->required(),
                TextInput::make('id_siswa')
                    ->required()
                    ->numeric(),
                TextInput::make('id_admin')
                    ->required()
                    ->numeric(),
                TextInput::make('id_buku')
                    ->required()
                    ->numeric(),
                DatePicker::make('tanggal_pinjam')
                    ->required(),
                DatePicker::make('tanggal_kembali'),
                DatePicker::make('batas_pengembalian')
                    ->required(),
                Select::make('status')
                    ->options([
            'dipinjam' => 'Dipinjam',
            'dikembalikan' => 'Dikembalikan',
            'terlambat' => 'Terlambat',
            'hilang' => 'Hilang',
        ])
                    ->required(),
                TextInput::make('denda')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Textarea::make('catatan')
                    ->columnSpanFull(),
            ]);
    }
}
