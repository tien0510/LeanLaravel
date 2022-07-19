<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PhpParser\Builder;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    public function get()
    {
//        $a = Menu::where('active',1)->get();
//        return Product::with('menu')->orderbyDesc('id')->paginate(10);
        return Product::with('menu')->orderbyDesc('id')->paginate(10);


    }


    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0 && $request->input('price_sale') >= $request->input('price')) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
        return true;
    }

    public function create($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        try {
            Product::create([
                'name' => (string)$request->input('name'),
                'description' => (string)$request->input('description'),
                'content' => (string)$request->input('content'),
                'menu_id' => (int)$request->input('menu_id'),
                'price' => (integer)$request->input('price'),
                'price_sale' => (integer)$request->input('price_sale'),
                'thumb' => (string)$request->input('thumb'),
                'slug' => Str::slug($request->input('name'), '-'),
                'active' => (int)$request->input('active'),
            ]);
            Session::flash('success', 'Thêm sản phẩm mới thành công ');

        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $product):bool
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === true){
            $product['name'] = (string)$request->input('name');
            $product['description'] = (string)$request->input('description');
            $product['content'] = (string)$request->input('content');
            $product['menu_id'] = (int)$request->input('menu_id');
            $product['price'] = (integer)$request->input('price');
            $product['price_sale'] = (integer)$request->input('price_sale');
            $product['thumb'] = (string)$request->input('thumb');
            $product['slug'] = Str::slug($request->input('name'), '-');
            $product['active'] = (int)$request->input('active');
            $product->save();
            Session::flash('success', 'Cập nhật phẩm mới thành công ');
            return true;
        }
        return false;

}
    public function destroy($request){
        $id = (int) $request->input('id');//main.js(8,13)
        $product = Product::where('id',$id)->first();
//        dd($product);
        if ($product){
//            return Product::where('id',$id)->delete();
            return $product->delete();
        }
        return false;
    }

    public function slug($request){
        $name =  (string) $request->input('name');

        $slug =  Str::slug($name, '-');

        $product = Product::where('slug',$slug)->first();

        if ($product) return true;
        return false;
    }
}
