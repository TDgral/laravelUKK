<?php

namespace App\Filament\Siswa\Resources\Peminjamen\Pages;

use App\Filament\Siswa\Resources\Peminjamen\PeminjamanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPeminjaman extends EditRecord
{
    protected static string $resource = PeminjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
