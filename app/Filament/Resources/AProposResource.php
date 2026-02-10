<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AProposResource\Pages;
use App\Models\APropos;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class AProposResource extends Resource
{
    protected static ?string $model = APropos::class;
    protected static ?int $navigationSort = 14;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),


                RichEditor::make('description')
                    ->required(),
                // Repeater for dynamically adding sentences
                Forms\Components\Repeater::make('sentences')
                    ->label('Sentences')
                    ->schema([
                        Forms\Components\TextInput::make('sentence')
                            ->label('Sentence')
                            ->required(),
                    ])
                    ->collapsible()  // Optional: Makes the items collapsible
                    ->minItems(1)     // Minimum number of sentences
                    ->createItemButtonLabel('Add another sentence'),


                Forms\Components\FileUpload::make('image_1')
                    ->label('First Image')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('image_2')
                    ->label('Second Image')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('description')->limit(50),
                ImageColumn::make('image_1')->label('First Image'),
                ImageColumn::make('image_2')->label('Second Image'),
            ])
            ->filters([
                // Add any filters if needed
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAPropos::route('/'),
            'create' => Pages\CreateAPropos::route('/create'),
            'edit' => Pages\EditAPropos::route('/{record}/edit'),
        ];
    }
}
