<?php

namespace App\Providers;

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
        \Illuminate\Pagination\Paginator::useBootstrapFive();
        \Illuminate\Support\Facades\View::composer('frontend.layouts.navbar', function ($view) {
            try {
                $categories = \App\Models\Category::with([
                    'productModels' => function ($q) {
                        $q->where('is_active', true);
                    },
                    'productModels.products' => function ($q) {
                        $q->where('is_active', true);
                    },
                    'products' => function ($q) {
                        $q->where('is_active', true);
                    }
                ])->where('is_active', true)->get();
            } catch (\Exception $e) {
                $categories = collect(); // Fallback to empty collection if table doesn't exist yet
            }
            $view->with('navbarCategories', $categories);
        });
    }


    
}
