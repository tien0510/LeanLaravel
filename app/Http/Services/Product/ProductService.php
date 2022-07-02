<?php

namespace App\Http\Services\Product;
use App\Models\Product;

class ProductService
{
    const LIMIT = 16;
    public function getProduct(){
            return Product::select('id','name','price','price_sale','thumb','slug')
                ->where('active',1)
                ->orderbyDesc('id')
                ->limit(self::LIMIT)
                ->get();
    }
}
