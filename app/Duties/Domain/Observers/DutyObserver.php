<?php

namespace App\Duties\Domain\Observers;

use App\Duties\Domain\Models\Duty;

class DutyObserver
{

    public function creating(Duty $duty)
    {
        $duty->user_id = auth()->user()->id;
    }
    /**
     * Handle the duty "created" event.
     *
     * @param  \App\Duties\Domain\Models\Duty  $duty
     * @return void
     */
    public function created(Duty $duty)
    {
        //
    }

    /**
     * Handle the duty "updated" event.
     *
     * @param  \App\Duties\Domain\Models\Duty  $duty
     * @return void
     */
    public function updated(Duty $duty)
    {
        //
    }

    /**
     * Handle the duty "deleted" event.
     *
     * @param  \App\Duties\Domain\Models\Duty  $duty
     * @return void
     */
    public function deleted(Duty $duty)
    {
        //
    }

    /**
     * Handle the duty "restored" event.
     *
     * @param  \App\Duties\Domain\Models\Duty  $duty
     * @return void
     */
    public function restored(Duty $duty)
    {
        //
    }

    /**
     * Handle the duty "force deleted" event.
     *
     * @param  \App\Duties\Domain\Models\Duty  $duty
     * @return void
     */
    public function forceDeleted(Duty $duty)
    {
        //
    }
}