<?php

namespace App\Observers;

use App\Models\Contract;
use Illuminate\Support\Facades\Cache;

class ContractObserver
{
    /**
     * Handle the Contract "created" event.
     */
    public function created(Contract $contract): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }

    /**
     * Handle the Contract "updated" event.
     */
    public function updated(Contract $contract): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }

    /**
     * Handle the Contract "deleted" event.
     */
    public function deleted(Contract $contract): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }

    /**
     * Handle the Contract "restored" event.
     */
    public function restored(Contract $contract): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }

    /**
     * Handle the Contract "force deleted" event.
     */
    public function forceDeleted(Contract $contract): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }
}
