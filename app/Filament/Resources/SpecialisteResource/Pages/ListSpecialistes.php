<?php

namespace App\Filament\Resources\SpecialisteResource\Pages;

use App\Filament\Resources\SpecialisteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpecialistes extends ListRecords
{
    protected static string $resource = SpecialisteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
