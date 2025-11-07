<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\ProductStatus;
use App\Enums\ProductType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Information')
                    ->description('Basic details about the product.')
                    ->schema([
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->native(false)
                            ->default(null),
                        Select::make('brand_id')
                            ->relationship('brand', 'name')
                            ->native(false)
                            ->default(null),
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('slug')
                            ->required(),
                        Select::make('type')
                            ->options(ProductType::class)
                            ->default('physical')
                            ->native(false)
                            ->required(),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$'),
                        TextInput::make('sale_price')
                            ->numeric()
                            ->default(null),
                        TextInput::make('cost_price')
                            ->numeric()
                            ->default(null),
                        TextInput::make('stock')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Toggle::make('in_stock')
                            ->required(),
                        TextInput::make('sku')
                            ->label('SKU')
                            ->default(null),
                        Textarea::make('short_description')
                            ->default(null)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->default(null)
                            ->columnSpanFull(),
                        Select::make('status')
                            ->options(ProductStatus::class)
                            ->default('draft')
                            ->native(false)
                            ->required(),
                        Toggle::make('is_featured')
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
