<?php

namespace App\Filament\Resources\Bukus\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BukuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_buku')
                    ->required(),
                FileUpload::make('cover_image')
                        ->image(),
                TextInput::make('judul')
                    ->required(),
                TextInput::make('penulis')
                    ->required(),
                TextInput::make('penerbit')
                    ->required(),
                DatePicker::make('tahun_terbit'),
                TextInput::make('kategori')
                    ->required()
                    ->relationship(name: 'KategoriBuku', titleAttribute: 'nama_kategori')
                    ->label('kategori'),
                TextInput::make('isbn')
                    ->numeric(),
                TextInput::make('jumlah_halaman')
                    ->required()
                    ->numeric(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('stok')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('lokasi_rak'),
            ]);
    }
}
