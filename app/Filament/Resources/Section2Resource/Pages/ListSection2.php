<?php

namespace App\Filament\Resources\Section2Resource\Pages;

use App\Filament\Resources\Section2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSection2 extends ListRecords
{
    protected static string $resource = Section2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
