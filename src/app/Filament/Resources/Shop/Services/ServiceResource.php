<?php

namespace App\Filament\Resources\Shop\Services;

use App\Filament\Resources\Shop\Services\Pages\ListServices;
use App\Filament\Resources\Shop\Services\Pages\CreateService;
use App\Filament\Resources\Shop\Services\Pages\EditService;
use App\Filament\Resources\Shop\Services\Schemas\ServiceForm;
use App\Filament\Resources\Shop\Services\Tables\ServicesTable;
use App\Filament\Resources\Shop\Services\Pages;
use Filament\Schemas\Schema;
use App\Models\Shop\Service;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use UnitEnum;
use BackedEnum;

class ServiceResource extends Resource {
    protected static ?string $model = Service::class;
    protected static ?string $slug = 'shop/services';
    protected static  string | UnitEnum | null $navigationGroup = 'Shop';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationLabel = 'Services';
    protected static ?int $navigationSort = 4;

    public static function table(Table $table): Table
    {
        return ServicesTable::configure($table);
    }

    public static function form(Schema $schema): Schema
    {
        return ServiceForm::configure($schema);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServices::route('/'),
            'create' => CreateService::route('/create'),
            'edit' => EditService::route('/{record}/edit'),
        ];
    }
}
