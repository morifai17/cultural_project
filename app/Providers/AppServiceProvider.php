<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    Relation::morphMap([
        'hall'      => 'App\Models\Hall',
        'center'    => 'App\Models\CulturalCenter',
        'theater'   => 'App\Models\Theater',
        'activity'  => 'App\Models\Activity',
    ]);
}
}
