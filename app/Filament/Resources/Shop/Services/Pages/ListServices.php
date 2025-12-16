<?php

namespace App\Filament\Resources\Shop\Services\Pages;

use App\Filament\Resources\Shop\Services\ServiceResource;
use Filament\Actions\CreateAction;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;

class ListServices extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = ServiceResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return ServiceResource::getWidgets();
    }



}
