<?php

namespace App\Filament\Resources\AProposResource\Pages;

use App\Filament\Resources\AProposResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAPropos extends ListRecords
{
    protected static string $resource = AProposResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
