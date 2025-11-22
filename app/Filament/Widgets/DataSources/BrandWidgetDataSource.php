<?php

namespace App\Filament\Widgets\DataSources;

use App\Models\Shop\Brand;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\Attribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\BooleanAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\DateAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\NumberAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\TextAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\EloquentWidgetDataSource;

class BrandWidgetDataSource extends EloquentWidgetDataSource
{
    protected ?string $model = Brand::class;

    protected ?int $sort = 2;

    /**
     * @return array<Attribute>
     */
    public function getAttributes(): array
    {
        return [
            TextAttribute::make('name'),
            TextAttribute::make('slug'),
            TextAttribute::make('website')
                ->nullable(),
            TextAttribute::make('description')
                ->nullable(),
            NumberAttribute::make('position'),
            BooleanAttribute::make('is_visible'),
            TextAttribute::make('seo_title')
                ->nullable(),
            TextAttribute::make('seo_description')
                ->nullable(),
            NumberAttribute::make('sort')
                ->nullable(),
            DateAttribute::make('created_at')
                ->nullable(),
            DateAttribute::make('updated_at')
                ->nullable(),
        ];
    }
}
