<?php

namespace App\Filament\Widgets\DataSources;

use Filament\CustomDashboardsPlugin\Enums\DashboardRole;
use Filament\CustomDashboardsPlugin\Models\Dashboard;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\Attribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\BooleanAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\DateAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\Attributes\TextAttribute;
use Filament\CustomDashboardsPlugin\Widgets\DataSources\EloquentWidgetDataSource;

class DashboardWidgetDataSource extends EloquentWidgetDataSource
{
    protected ?string $model = Dashboard::class;

    /**
     * @return array<Attribute>
     */
    public function getAttributes(): array
    {
        return [
            TextAttribute::make('name'),
            TextAttribute::make('slug'),
            TextAttribute::make('default_role')
                ->enum(DashboardRole::class)
                ->nullable(),
            BooleanAttribute::make('has_navigation_item'),
            TextAttribute::make('navigation_icon')
                ->nullable(),
            TextAttribute::make('navigation_label')
                ->nullable(),
            TextAttribute::make('navigation_group')
                ->nullable(),
            DateAttribute::make('created_at')
                ->nullable(),
            DateAttribute::make('updated_at')
                ->nullable(),
            DateAttribute::make('deleted_at')
                ->nullable(),
        ];
    }
}
