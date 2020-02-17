<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        //左侧菜单
        view()->composer('home.layout',function($view){
            $menus = \App\Models\Permission::with([
                'childs'=>function($query){$query->with('icon');}
                ,'icon'])->where('parent_id',0)->orderBy('sort','desc')->get();
            $unreadMessage = \App\Models\Message::where('read',1)->where('accept_id',auth()->user()->id)->count();
            $view->with('menus',$menus);
            $view->with('unreadMessage',$unreadMessage);
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
