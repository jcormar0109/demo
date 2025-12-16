<?php

namespace App\Filament\Resources\Shop\Services\Pages;

use App\Filament\Resources\Shop\Services\ServiceResource;
use App\Filament\Resources\Shop\Services\Schemas\ServiceForm;
use App\Models\Shop\Order;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard\Step;

class CreateService extends CreateRecord
{
    use HasWizard;

    protected static string $resource = ServiceResource::class;

    /**
     * @return array<Step>
     */
    protected function getSteps(): array
    {
        return [
            Step::make('Service Details')
                ->schema([
                    Section::make()
                        ->schema(ServiceForm::getServiceDetailsComponents())
                        ->columns(),
                ]),
        ];
    }

    protected function afterCreate(): void
    {
        /** @var Order $order */
        $service = $this->record;

        /** @var User $user */
        $user = auth()->user();

        Notification::make()
            ->title('New Service created')
            ->icon('heroicon-o-wrench-screwdriver')
            ->body("A new service has been created.")
            ->actions([
                Action::make('View')
                    ->url(ServiceResource::getUrl('edit', ['record' => $service])),
            ])
            ->sendToDatabase($user);
    }
}
