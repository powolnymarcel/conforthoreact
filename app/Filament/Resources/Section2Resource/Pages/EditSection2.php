<?php

namespace App\Filament\Resources\Section2Resource\Pages;

use App\Filament\Resources\Section2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSection2 extends EditRecord
{
    protected static string $resource = Section2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
