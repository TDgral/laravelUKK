<?php

namespace App\Filament\Resources\Bukus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BukusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_buku')
                    ->searchable(),
                ImageColumn::make('cover_image'),
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('penulis')
                    ->searchable(),
                TextColumn::make('penerbit')
                    ->searchable(),
                TextColumn::make('tahun_terbit')
                    ->date()
                    ->sortable(),
                TextColumn::make('kategoriBuku.nama_kategori')
                    ->searchable(),
                TextColumn::make('isbn')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jumlah_halaman')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('stok')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lokasi_rak')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')->multiple()->options([
                    
                ])
            ], layout: FiltersLayout::AboveContent)
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
