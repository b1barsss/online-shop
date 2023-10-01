<?php

namespace App\Providers;

use App\Sources\Catalogs\OrderStatus\OrderStatusEnum;
use App\Sources\Main\Cart\CartRepository;
use App\Sources\Main\Order\OrderRepository;
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

            if (Auth::isLoggedIn()) {
                $OrderRepositoryQuery = OrderRepository::useMain()
                    ->addJoinProducts()
                    ->query()
                    ->where('main.catalog_order_status', OrderStatusEnum::PENDING);

                if (Auth::isAdmin()) {
                    $OrderRepositoryQuery = $OrderRepositoryQuery->where('product.created_by', Auth::user()->id);
                } elseif (Auth::isCustomer()) {
                    $OrderRepositoryQuery = $OrderRepositoryQuery->where('main.customer_id', Auth::user()->id);
                }
                $OrderRepository = $OrderRepositoryQuery->get();

                $orderBadge = $OrderRepository->count();
            } else {
                $orderBadge = 0;
            }

            $view->with(['cartBadge' => $cartBadge, 'orderBadge' => $orderBadge]);
        });
    }
}
