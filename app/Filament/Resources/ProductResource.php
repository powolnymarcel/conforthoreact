<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\RichEditor;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?int $navigationSort = 10;
    protected static ?string $navigationLabel = 'Produits';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_category_id')
                    ->label(trans('products.category'))
                    ->relationship('category', 'title')
                    ->required()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Str::slug($state))),

                Forms\Components\FileUpload::make('picture')
                    ->label(trans('products.picture'))
                    ->image()
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->label(trans('products.title'))
                    ->required(),

                RichEditor::make('description')
                    ->required(),

                Forms\Components\Toggle::make('mettre_en_avant')
                    ->label(trans('products.featured'))
                    ->default(false),

                Forms\Components\Toggle::make('afficher')
                    ->label(trans('products.visible'))
                    ->default(true),
            ]);
    }

    public static function getModelLabel(): string
    {
        return trans('products.products'); // Translated label for the model
    }


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(trans('products.title'))
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('picture')
                    ->label(trans('products.picture')),

                TextColumn::make('category.title')
                    ->label(trans('products.category'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('mettre_en_avant')
                    ->label(trans('products.featured'))
                    ->sortable(),

                TextColumn::make('afficher')
                    ->label(trans('products.visible'))
                    ->sortable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
