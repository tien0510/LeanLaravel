<?php

namespace App\Http\View\Composers;
use App\Models\Menu;
use App\Models\Slider;
use Illuminate\View\View;
class MenuComposer
{

    protected $users;
    public function __construct()
    {

    }


    public function compose(View $view)
    {
       $menus =  Menu::select('id','name','parent_id','slug')->where('active',1)->get();
        $view->with('menus',$menus);
        $view->with('menu_mb',$menus);
//có thể lấy menucomsopse hoặc maincontroller
//        $sliders = Slider::select()->where('active',1)->get();
//        $view->with('sliders',$sliders);

    }
}
