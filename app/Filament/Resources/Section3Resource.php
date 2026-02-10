<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Section3Resource\Pages;
use App\Models\Section3;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class Section3Resource extends Resource
{
    protected static ?string $model = Section3::class;
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Accueil Section 3';
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
                Forms\Components\TextInput::make('category')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\RichEditor::make('ul_li_list')
                    ->required()
                    ->toolbarButtons(['bulletList'])
                    ->extraAttributes(['data-trix-attributes' => 'ul-li-only']),
                    Forms\Components\RichEditor::make('ul_li_list_2')
                    ->required()
                    ->toolbarButtons(['bulletList'])
                    ->extraAttributes(['data-trix-attributes' => 'ul-li-only']),
                Forms\Components\TextInput::make('link')
                    ->url()
                    ->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('category')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('description')->sortable()->searchable(),
                TextColumn::make('ul_li_list')->sortable()->searchable(),
                TextColumn::make('ul_li_list_2')->sortable()->searchable(),
                TextColumn::make('link')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSection3::route('/'),
            'create' => Pages\CreateSection3::route('/create'),
            'edit' => Pages\EditSection3::route('/{record}/edit'),
        ];
    }
}
