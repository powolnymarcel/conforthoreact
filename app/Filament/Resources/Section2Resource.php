<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Section2Resource\Pages;
use App\Models\Section2;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class Section2Resource extends Resource
{
    protected static ?string $model = Section2::class;
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Accueil Section 2';
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
                Forms\Components\Textarea::make('svg')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('svg')->sortable()->searchable(),
                TextColumn::make('description')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSection2::route('/'),
            'create' => Pages\CreateSection2::route('/create'),
            'edit' => Pages\EditSection2::route('/{record}/edit'),
        ];
    }
}
