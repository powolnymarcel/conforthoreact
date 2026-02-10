<?php

namespace App\Filament\Resources\Section4Resource\Pages;

use App\Filament\Resources\Section4Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSection4 extends EditRecord
{
    protected static string $resource = Section4Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
