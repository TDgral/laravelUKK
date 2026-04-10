<?php

namespace App\Filament\Siswa\Resources\Peminjamen;

use App\Filament\Siswa\Resources\Peminjamen\Pages\CreatePeminjaman;
use App\Filament\Siswa\Resources\Peminjamen\Pages\EditPeminjaman;
use App\Filament\Siswa\Resources\Peminjamen\Pages\ListPeminjamen;
use App\Filament\Siswa\Resources\Peminjamen\Schemas\PeminjamanForm;
use App\Filament\Siswa\Resources\Peminjamen\Tables\PeminjamenTable;
use App\Models\Peminjaman;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getModelLabel(): string {
        return 'Peminjaman';
    }

    public static function getPluralModelLabel(): string {
        return 'Peminjaman';
    }

    protected static ?string $navigationLabel = 'Peminjaman';

    public static function form(Schema $schema): Schema
    {
        return PeminjamanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PeminjamenTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPeminjamen::route('/'),
            'create' => CreatePeminjaman::route('/create'),
            'edit' => EditPeminjaman::route('/{record}/edit'),
        ];
    }
}
