<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\SubCategory;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('pagination-custom.default');
        Paginator::defaultSimpleView('pagination-custom.simple-default');
        view()->composer('frontend.partials.header', function($view){
            $categoryandsub = Category::all();
            $cart = new Cart();
            if (Auth::check()) {
                $user_id = Auth::user()->user_id;
                $numListCartHeader = $cart->numListCart($user_id);
                $ListCartHeader = $cart->listCart($user_id)->take(4)->get();
            } else {
                $numListCartHeader = '0';
                $ListCartHeader = 'Vui lòng đăng nhập';
            }
            $view->with(['categoryandsub' => $categoryandsub, 'ListCartHeader' => $ListCartHeader, 'numListCartHeader' => $numListCartHeader]);
        });
    }
}
