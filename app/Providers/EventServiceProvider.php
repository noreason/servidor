<?php

namespace Servidor\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'Servidor\Events\SiteUpdated' => [
            'Servidor\Listeners\WriteSiteConfig',
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();
    }
}
