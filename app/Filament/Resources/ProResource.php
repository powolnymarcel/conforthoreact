<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProResource\Pages;
use App\Models\Pro;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProResource extends Resource
{
    protected static ?int $navigationSort = 13;

    protected static ?string $model = Pro::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),

                Forms\Components\TextInput::make('category')
                    ->required(),

                Forms\Components\TextInput::make('subtitle')
                    ->nullable(),

                RichEditor::make('description')
                    ->required(),

                Forms\Components\FileUpload::make('file_1')
                    ->label('First File')
                    ->required(),

                Forms\Components\FileUpload::make('file_2')
                    ->label('Second File')
                    ->required(),

                Forms\Components\TextInput::make('external_link')
                    ->label('External Link')
                    ->url()
                    ->nullable(),

                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('category')->sortable()->searchable(),
                TextColumn::make('subtitle'),
                ImageColumn::make('image')->label('Image'),
            ])
            ->filters([
                // Add filters if needed
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPros::route('/'),
            'create' => Pages\CreatePro::route('/create'),
            'edit' => Pages\EditPro::route('/{record}/edit'),
        ];
    }
}
