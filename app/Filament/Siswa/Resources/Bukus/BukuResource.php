<?php

namespace App\Filament\Siswa\Resources\Bukus;

use App\Filament\Siswa\Resources\Bukus\Pages\ListBukus;
use App\Filament\Siswa\Resources\Bukus\Schemas\BukuForm;
use App\Filament\Siswa\Resources\Bukus\Tables\BukusTable;
use App\Models\Buku;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getPluralModelLabel(): string {
        return 'Buku';
    }

    public static function getModelLabel(): string {
        return 'Buku';
    }

    protected static ?string $navigationLabel = 'Buku';

    protected static ?string $recordTitleAttribute = 'Siswa';

    public static function form(Schema $schema): Schema
    {
        return BukuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BukusTable::configure($table);
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
            'index' => ListBukus::route('/'),
        ];
    }
}
