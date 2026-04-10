<?php

namespace App\Filament\Siswa\Resources\Bukus\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\Layout\Stack;

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
            ->paginated([12])
            ->filters([
                //
            ])
            ->recordActions([
            ])
            ->toolbarActions([
            ]);
    }
}
