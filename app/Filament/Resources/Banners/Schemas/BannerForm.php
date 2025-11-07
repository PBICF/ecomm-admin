<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->default(null),
                TextInput::make('subtitle')
                    ->default(null),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                TextInput::make('link_url')
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
                DateTimePicker::make('show_on'),
                DateTimePicker::make('show_until'),
            ]);
    }
}
