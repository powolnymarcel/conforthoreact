<?php

namespace App\Filament\Resources\Section3Resource\Pages;

use App\Filament\Resources\Section3Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSection3 extends EditRecord
{
    protected static string $resource = Section3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
