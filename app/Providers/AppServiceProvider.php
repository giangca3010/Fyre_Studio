<?php

namespace App\Providers;

use App\Models\Footer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

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
    public function boot(Request $request)
    {
        $menus = json_decode(file_get_contents(config_path('app/client-menus.json')));
        $language = $request->language ?? 'vi';
        $footers = Footer::query()->orderBy('position')->get();
        View::share([
            'language' => $language,
            'footers' => $footers,
            'menus' => $menus
        ]);        Paginator::defaultView('core-ui.components.pagination');
    }
}
