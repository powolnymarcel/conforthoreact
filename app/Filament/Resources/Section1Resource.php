<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Section1Resource\Pages;
use App\Models\Section1;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class Section1Resource extends Resource
{
    protected static ?int $navigationSort = 2;
    protected static ?string $model = Section1::class;
    protected static ?string $navigationLabel = 'Accueil Section 1';
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
                Forms\Components\TextInput::make('link')
                    ->url()
                    ->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('description')->sortable()->searchable(),
                TextColumn::make('link')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSection1::route('/'),
            'create' => Pages\CreateSection1::route('/create'),
            'edit' => Pages\EditSection1::route('/{record}/edit'),
        ];
    }
}
