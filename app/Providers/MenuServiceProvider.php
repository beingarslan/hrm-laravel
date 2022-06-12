<?php

namespace App\Providers;

use App\Models\Interface\Menu;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('menus')) {
            // get all data from menu.json file
            $verticalMenuData = Menu::doesnthave('parent')->with('children')->orderBy('order')->get();
            // Share all menuData to all the views
            View::share('menuData', [$verticalMenuData]);
        }
        else {
            $verticalMenuData = [];
            // Share all menuData to all the views
            View::share('menuData', [$verticalMenuData]);
        }
    }
}
