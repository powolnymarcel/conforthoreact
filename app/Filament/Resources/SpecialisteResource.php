<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpecialisteResource\Pages;
use App\Models\Specialiste;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class SpecialisteResource extends Resource
{
    protected static ?string $model = Specialiste::class;
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationLabel = 'Spécialistes';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Str::slug($state . ' ' . $form->getState('firstname')))),
                Forms\Components\TextInput::make('firstname')
                    ->required()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Str::slug($form->getState('name') . ' ' . $state))),
                Forms\Components\FileUpload::make('picture')
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('job')
                    ->required(),
                Forms\Components\TextInput::make('short_description')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(Specialiste::class, 'slug')
                    ->hidden(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('firstname')->sortable()->searchable(),
                ImageColumn::make('picture'),
                TextColumn::make('short_description')->sortable()->searchable(),
                TextColumn::make('job')->sortable()->searchable(),
                TextColumn::make('slug')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpecialistes::route('/'),
            'create' => Pages\CreateSpecialiste::route('/create'),
            'edit' => Pages\EditSpecialiste::route('/{record}/edit'),
        ];
    }
}
