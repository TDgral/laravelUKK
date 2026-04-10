<?php

namespace App\Filament\Siswa\Resources\Peminjamen\Pages;

use App\Filament\Siswa\Resources\Peminjamen\PeminjamanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPeminjamen extends ListRecords
{
    protected static string $resource = PeminjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
