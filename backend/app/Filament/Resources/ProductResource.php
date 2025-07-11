<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Товары'; 
    protected static ?string $pluralModelLabel = 'Товары'; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Название'),

                Forms\Components\Textarea::make('description')
                    ->label('Описание'),

                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->label('Цена'),

                Forms\Components\TextInput::make('category')
                    ->label('Категория'),

                Forms\Components\TextInput::make('series')
                    ->label('Серия'),

                Forms\Components\TextInput::make('age_group')
                    ->label('Возраст'),

                Forms\Components\TextInput::make('tablet_count')
                    ->numeric()
                    ->label('Кол-во таблеток'),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('products')
                    ->label('Изображение')
                    ->disk('public')
                    ->imagePreviewHeight('100'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Название'),
                Tables\Columns\TextColumn::make('price')->label('Цена'),
                Tables\Columns\TextColumn::make('category')->label('Категория'),
                Tables\Columns\TextColumn::make('series')->label('Серия'),
                Tables\Columns\TextColumn::make('age_group')->label('Возраст'),
                Tables\Columns\TextColumn::make('tablet_count')->label('Таблетки'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Редактировать'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Удалить выбранные'),
                ]),
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