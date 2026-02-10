<?php

namespace App\Filament\Resources\Section1Resource\Pages;

use App\Filament\Resources\Section1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSection1 extends ListRecords
{
    protected static string $resource = Section1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
