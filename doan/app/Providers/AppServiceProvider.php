<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use Cart;
use App\Models\NhaCC;
use App\Models\DanhMuc;

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
        //
        Paginator::useBootstrap();
        view()->composer('web/layouts/header',function($view){
            $nhaCC = NhaCC::all();
            $danhMuc =DanhMuc::all();
            $cart=Cart::getContent();
            $tong=Cart::getTotal();//lay so luong cac san pham cua gioi hang
            $view->with('cart',$cart)
            ->with('tong',$tong)
            ->with('nhacc',$nhaCC)
            ->with('danhmuc',$danhMuc);
        });
    }
}
