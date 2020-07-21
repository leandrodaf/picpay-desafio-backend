<?php

namespace App\Jobs;

use App\Services\WalletService;
use App\Events\CreateTransaction;

class UpdatePayeeWallet
{
    private $walletService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CreateTransaction $createTransactionEvent): void
    {
        $this->walletService->depositByTransaction($createTransactionEvent->getTransaction());
    }
}
