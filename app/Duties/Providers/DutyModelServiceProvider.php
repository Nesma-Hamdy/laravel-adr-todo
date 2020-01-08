<?php

namespace App\Duties\Providers;

use App\Duties\Domain\Models\Duty;
use App\Duties\Domain\Observers\DutyObserver;
use Illuminate\Support\ServiceProvider;

class DutyModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Duty::observe(DutyObserver::class);
    }
}