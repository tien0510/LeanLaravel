<?php

namespace App\Http\Services;



use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{

 public function create($request)
    {
        $qty = (int)$request->input('num-product');
        $product_id = (int)$request->input('product_id');
//print_r($request->all());
//        print_r($qty);
//        print_r($product_id);


        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return "điên à";
        }
//die();
        $carts = Session::get('carts');
//dd($carts);
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if(is_null($carts)) return [];

        $productId= array_keys($carts);

        return Product::select('id','name','thumb','price_sale','slug')
            ->where('active',1)
            ->whereIn('id',$productId)
            ->get();

    }

     public function update($request)
     {

         Session::put('carts', $request->input('num_product'));
         return true;
     }

     public function destroy($request){
         $carts = Session::get('carts');
         $id = (int) $request->input('id');//main.js(8,13)
         unset($carts[$id]);

         Session::put('carts', $carts);
         return true;

     }
}
