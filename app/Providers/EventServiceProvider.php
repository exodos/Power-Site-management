<?php

namespace App\Providers;

use App\Events\Site\SiteActivityEvent;
use App\Events\Site\SiteCreate;
use App\Events\Site\SiteCreated;
use App\Listeners\Site\SiteEmailNotification;
use App\Listeners\Site\SiteEmailNotifications;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;


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

//        SiteCreate::class => [
//            SiteEmailNotifications::class,
//        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
