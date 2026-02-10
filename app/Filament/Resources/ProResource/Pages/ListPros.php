<?php

namespace App\Filament\Resources\ProResource\Pages;

use App\Filament\Resources\ProResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPros extends ListRecords
{
    protected static string $resource = ProResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
