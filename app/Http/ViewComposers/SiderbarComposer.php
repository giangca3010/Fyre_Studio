<?php


namespace App\Http\ViewComposers;


use App\Models\AdminMenu;
use Illuminate\View\View;

class SiderbarComposer
{
    public function __construct()
    {
        //
    }

    public function compose(View $view)
    {
        $menuSiderbar = json_decode(file_get_contents(config_path('app/adminMenu.json')), true);

        $colorSiberbar = [
            1 => 'blue',
            2 => 'red',
            3 => 'yellow',
            4 => 'green',
            5 => 'black',
            6 => 'white',
        ];
        $view->with([
            'menuSiderbar' => $menuSiderbar,
            'colorSiberbar' => $colorSiberbar,
        ]);
    }
}
