<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\CreateTransaction::class => [
            \App\Jobs\ProcessTransaction::class,
            \App\Jobs\UpdatePayerWallet::class,
            \App\Jobs\UpdatePayeeWallet::class,
        ],
        \App\Events\TransactionProcessedError::class => [
            \App\Jobs\TransactionRollback::class,
        ],
    ];
}
