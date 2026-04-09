<?php

namespace App\Filament\Resources\KategoriBukus;

use App\Filament\Resources\KategoriBukus\Pages\CreateKategoriBuku;
use App\Filament\Resources\KategoriBukus\Pages\EditKategoriBuku;
use App\Filament\Resources\KategoriBukus\Pages\ListKategoriBukus;
use App\Filament\Resources\KategoriBukus\Schemas\KategoriBukuForm;
use App\Filament\Resources\KategoriBukus\Tables\KategoriBukusTable;
use App\Models\KategoriBuku;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KategoriBukuResource extends Resource
{
    protected static ?string $model = KategoriBuku::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'kategori';

    public static function getModelLabel(): string {
        return 'Kategori Buku';
    }

    public static function getPluralModelLabel(): string {
        return 'Kategori Buku';
    }

    protected static ?string $navigationLabel = 'Kategori Buku';

    public static function form(Schema $schema): Schema
    {
        return KategoriBukuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KategoriBukusTable::configure($table);
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
            'index' => ListKategoriBukus::route('/'),
            'create' => CreateKategoriBuku::route('/create'),
            'edit' => EditKategoriBuku::route('/{record}/edit'),
        ];
    }
}
