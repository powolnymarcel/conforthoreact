<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Section4Resource\Pages;
use App\Models\Section4;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class Section4Resource extends Resource
{
    protected static ?string $model = Section4::class;
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'Accueil Section 4';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                ->image()
                ->required(),
                Forms\Components\Textarea::make('text')
                    ->required(),
                Forms\Components\TextInput::make('note')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('category')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('text')->sortable()->searchable(),
                TextColumn::make('note')->sortable()->searchable(),
                TextColumn::make('category')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSection4::route('/'),
            'create' => Pages\CreateSection4::route('/create'),
            'edit' => Pages\EditSection4::route('/{record}/edit'),
        ];
    }
}
