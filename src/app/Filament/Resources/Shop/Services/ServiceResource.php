<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\ServiceResource\Pages;
use App\Models\Shop\Service;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;

class ServiceResource extends Resource {
    protected static ?string $model = Service::class;
    protected static ?string $slug = 'shop/services';
}
