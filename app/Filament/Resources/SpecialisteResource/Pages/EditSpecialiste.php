<?php

namespace App\Filament\Resources\SpecialisteResource\Pages;

use App\Filament\Resources\SpecialisteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpecialiste extends EditRecord
{
    protected static string $resource = SpecialisteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
