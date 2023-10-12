<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Contract;
use App\Models\File;
use App\Observers\CategoryObserver;
use App\Observers\ContractObserver;
use App\Observers\FileObserver;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;
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


        Contract::observe(ContractObserver::class);
        File::observe(FileObserver::class);
        Category::observe(CategoryObserver::class);

        $categories = Category::all();

        View::share(['categories' => $categories]);
    }
}
