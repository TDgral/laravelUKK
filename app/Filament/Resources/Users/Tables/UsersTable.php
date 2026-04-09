<?php

namespace App\Filament\Resources\Users\Tables;

use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->with('siswa');
            })
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('nama_lengkap')
                    ->searchable(),
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('role')
                    ->badge(),
                TextColumn::make('email_verified_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->searchable(),
                TextColumn::make('telepon')
                    ->sortable(),
                TextColumn::make('siswa.nis')
                ->label('NIS')
                ->searchable(),
                TextColumn::make('siswa.kelas')
                ->label('Kelas')
                ->searchable(),
                TextColumn::make('siswa.jurusan')
                ->label('jurusan')
                ->searchable(),
                TextColumn::make('siswa.Tanggal_lahir')
                ->label('Tanggal Lahir')
                ->searchable(),
                TextColumn::make('siswa.status')
                ->label('status')
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
                SelectFilter::make('role')
                ->label('Role Pengguna')
                ->multiple()
                ->options([
                    'admin' => 'Admin',
                    'siswa' => 'Siswa'
                ])->preload(),
                SelectFilter::make('status')
                ->label('Status Pengguna')
                ->multiple()
                ->options([
                    'aktif' => 'Aktif',
                    'lulus' => 'Lulus',
                    'keluar' => 'Keluar'
                ])->preload(),
            ])
            ->deferFilters(false)
            ->filtersLayout(FiltersLayout::AboveContent)
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
