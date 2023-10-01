<?php

namespace App\Providers;

use App\Sources\Main\Cart\CartRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class MyViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $cartBadge = 0;
            if (Auth::isCustomer()) {
                $cartBadge = CartRepository::useMain()
                    ->addJoinDtProducts()
                    ->query()
                    ->where('user_id', Auth::user()->id)
                    ->count();
            }

//            if (Auth::isLoggedIn()) {
//
//            }
//                $view->with('orderBadge', $orderBadge);
            $view->with(['cartBadge' => $cartBadge]);
        });
    }
}
