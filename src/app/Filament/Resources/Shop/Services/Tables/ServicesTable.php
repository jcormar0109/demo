<?php

namespace App\Filament\Resources\Shop\Services\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Squire\Models\Currency;

class ServicesTable {
    public static function configure($table): Table{
        return $table
            ->columns([
                TextColumn::make('Name')
                ->searchable()
                ->sortable(),
                TextColumn::make('Shop product id')
                ->searchable()
                ->sortable(),
            ])

            ->recordActions([
                EditAction::make(),
            ]);
    }
}
