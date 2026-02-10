<?php

namespace App\Filament\Resources\DeroulantResource\Pages;

use App\Filament\Resources\DeroulantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeroulants extends ListRecords
{
    protected static string $resource = DeroulantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
