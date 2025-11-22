<?php

namespace App\Filament\Widgets\DataSources;

use App\Models\Shop\ProductCategory;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\Attribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\BooleanAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\DateAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\NumberAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\RelationshipAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\TextAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\EloquentWidgetDataSource;

class ProductCategoryWidgetDataSource extends EloquentWidgetDataSource
{
    protected ?string $model = ProductCategory::class;

    protected ?int $sort = 1;

    /**
     * @return array<Attribute>
     */
    public function getAttributes(): array
    {
        return [
            RelationshipAttribute::make('parent')
                ->titleAttribute('name')
                ->emptyable(),
            TextAttribute::make('name'),
            TextAttribute::make('slug'),
            TextAttribute::make('description')
                ->nullable(),
            NumberAttribute::make('position'),
            BooleanAttribute::make('is_visible'),
            TextAttribute::make('seo_title')
                ->nullable(),
            TextAttribute::make('seo_description')
                ->nullable(),
            DateAttribute::make('created_at')
                ->nullable(),
            DateAttribute::make('updated_at')
                ->nullable(),
        ];
    }
}
