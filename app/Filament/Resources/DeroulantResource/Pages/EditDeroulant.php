<?php

namespace App\Filament\Resources\DeroulantResource\Pages;

use App\Filament\Resources\DeroulantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeroulant extends EditRecord
{
    protected static string $resource = DeroulantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
