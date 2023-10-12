<?php

namespace App\Observers;

use App\Models\File;
use Illuminate\Support\Facades\Cache;

class FileObserver
{
    /**
     * Handle the File "created" event.
     */
    public function created(File $file): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }

    /**
     * Handle the File "updated" event.
     */
    public function updated(File $file): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }

    /**
     * Handle the File "deleted" event.
     */
    public function deleted(File $file): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }

    /**
     * Handle the File "restored" event.
     */
    public function restored(File $file): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }

    /**
     * Handle the File "force deleted" event.
     */
    public function forceDeleted(File $file): void
    {
        Cache::forget('contracts');
        Cache::forget('categories');
    }
}
