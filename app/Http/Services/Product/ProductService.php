<?php

namespace App\Http\Services\Product;
use App\Models\Product;

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
}
