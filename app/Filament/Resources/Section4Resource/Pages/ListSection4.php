<?php

namespace App\Filament\Resources\Section4Resource\Pages;

use App\Filament\Resources\Section4Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSection4 extends ListRecords
{
    protected static string $resource = Section4Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
