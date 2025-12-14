<?php

namespace App\Filament\Resources\Shop\Services\Schemas;

use App\Models\Shop\Product;
use App\Models\Shop\Service;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Model;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Service Details')
                        ->schema(static::getServiceDetailsComponents())
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),
            ])
            ->columns(3);
    }

    public static function getServiceDetailsComponents(): array
    {
        return [
            TextInput::make('name')
            ->required()
                ->maxLength(255)
                ->unique(Service::class, 'name', ignoreRecord: true),

            Select::make('product_id')
            ->relationship('product', 'name')
            ->searchable()
                ->required()
                ->label('Associated Product'),
        ];
    }
}
