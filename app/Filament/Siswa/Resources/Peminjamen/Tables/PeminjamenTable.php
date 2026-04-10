<?php

namespace App\Filament\Siswa\Resources\Peminjamen\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PeminjamenTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_peminjaman')
                    ->searchable(),
                TextColumn::make('id_siswa')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id_admin')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id_buku')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggal_pinjam')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_kembali')
                    ->date()
                    ->sortable(),
                TextColumn::make('batas_pengembalian')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('denda')
                    ->getStateUsing(function ($record) {
                        if ($record->status === 'dikembalikan') {
                            return $record->pengembalian?->denda_bayar ?? 0;
                        }
                        $keterlambatan = now()->diffInDays($record->batas_pengembalian, false);
                        return $keterlambatan > 0 ? $keterlambatan * 5000 : 0;
                    })
                    ->money('IDR')
                    -badge()
                    ->numeric()
                    ->sortable(),
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
                //
            ])
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
