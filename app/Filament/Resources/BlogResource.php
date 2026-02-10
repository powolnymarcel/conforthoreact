<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\RichEditor;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationLabel = 'Blog/actus';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Str::slug($state))),
                Forms\Components\TextInput::make('category')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('user_name')
                    ->required(),
                Forms\Components\TextInput::make('user_firstname')
                    ->required(),
                RichEditor::make('content')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(Blog::class, 'slug')
                    ->hidden(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('category')->sortable()->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('date')->sortable(),
                TextColumn::make('user_name')->sortable()->searchable(),
                TextColumn::make('user_firstname')->sortable()->searchable(),
                TextColumn::make('slug')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
