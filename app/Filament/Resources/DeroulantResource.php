<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeroulantResource\Pages;
use App\Models\Deroulant;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DeroulantResource extends Resource
{
    protected static ?string $model = Deroulant::class;
    protected static ?int $navigationSort = 11;
    protected static ?string $navigationLabel = 'Texte déroulant';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeroulants::route('/'),
            'create' => Pages\CreateDeroulant::route('/create'),
            'edit' => Pages\EditDeroulant::route('/{record}/edit'),
        ];
    }
}
