<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('coupon_id')
                    ->relationship('coupon', 'name')
                    ->default(null),
                Select::make('address_id')
                    ->relationship('address', 'name')
                    ->default(null),
                TextInput::make('order_number')
                    ->required(),
                TextInput::make('currency')
                    ->required()
                    ->default('INR'),
                Select::make('status')
                    ->options(OrderStatus::class)
                    ->default('pending')
                    ->required(),
                TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('tax')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('shipping_cost')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('coupon_code')
                    ->default(null),
                TextInput::make('coupon_value')
                    ->numeric()
                    ->default(null),
                TextInput::make('tracking_number')
                    ->default(null),
                TextInput::make('carrier')
                    ->default(null),
                DateTimePicker::make('shipped_at'),
                DateTimePicker::make('delivered_at'),
                Textarea::make('customer_notes')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('admin_notes')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('ordered_at')
                    ->required(),
                DateTimePicker::make('cancelled_at'),
            ]);
    }
}
