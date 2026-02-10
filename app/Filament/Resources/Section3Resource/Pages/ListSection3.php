<?php

namespace App\Filament\Resources\Section3Resource\Pages;

use App\Filament\Resources\Section3Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSection3 extends ListRecords
{
    protected static string $resource = Section3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
