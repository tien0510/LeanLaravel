<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService ;
    public function __construct(MenuService $menuService)
    {
        $this->menuService=$menuService;
    }

    public function index(Request $request,$id,$slug){
     $menu = $this->menuService->getId($id);
     $title = $menu->name;
     $title1  = $this->menuService->getname1($id);
     if ($title1 !==null && $title1->id ==$id){
         $title = $title1;
     }
        $title = $title1;

     $products = $this->menuService->getProduct($menu,$id,$request);
//dd($title);
     return view('menu',[
         'title'=> $title->name,
//         'name'=> $title->name,
         'products'=>$products,
         'menu'=>$menu
     ]);
    }


}
