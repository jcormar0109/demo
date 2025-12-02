<?php

namespace App\Models;

use Filament\CustomDashboardsPlugin\Contracts\CanReceiveSharedDashboards;
use Filament\Models\Contracts\HasCurrentTenantLabel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Team extends Model implements CanReceiveSharedDashboards, HasCurrentTenantLabel
{
    public function getCurrentTenantLabel(): string
    {
        return 'Current team';
    }

    /** @return BelongsToMany<User, $this> */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public static function getDashboardShareableLabel(): string
    {
        return 'Team';
    }

    public static function getDashboardShareableTitleAttribute(): string
    {
        return 'name';
    }

    public static function resolveDashboardShareablesForUser(Authenticatable $user): ?Relation
    {
        /** @var User $user */
        return $user->teams();
    }

    public static function getDashboardShareableOptionsQuery(Authenticatable $user): Builder
    {
        /** @var User $user */
        return $user->teams()->getQuery();
    }
}
