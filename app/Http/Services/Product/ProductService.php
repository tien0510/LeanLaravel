<?php

namespace App\Http\Services\Product;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductService
{
    const LIMIT = 16;
    public function getProduct($page = null){
            return Product::select('id','name','price','price_sale','thumb','slug')
                ->where('active',1)
                ->orderbyDesc('id')
                ->when($page != null,function ($query)use($page){
                    $query ->offset( $page * self::LIMIT);
                })
                ->limit(self::LIMIT)
                ->get();
    }
    public function show($id){
        return Product::where('id',$id)
            ->where('active',1)
            ->with('menu')
            ->firstOrFail();
    }
    public function getIdMenus($id)
    {

        return Product::select('menu_id')
            ->where('id',$id)
            ->firstOrFail();


    }
    public function relatedproducts($menu,$id){
        return Product::inRandomOrder()
            ->where('menu_id',$menu->menu_id)
            ->where('id','!=',$id)
            ->limit(5)
            ->get();
    }
}

