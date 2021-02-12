<?php

namespace App\Providers;

use App\Providers\ModelRated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailModelRatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ModelRated  $event
     * @return void
     */
    public function handle(ModelRated $event)
    {
        //
    }
}
