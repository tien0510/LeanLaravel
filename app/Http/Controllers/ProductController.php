<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $menuService;

    public function __construct(ProductService $productService,MenuService $menuService)
    {
        $this->productService = $productService;
        $this->menuService= $menuService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);

        $menu = $this->productService->getIdMenus($id);

        $related = $this->productService->relatedproducts($menu,$id);
        return view('products.content',[
            'title'=>$product->name,
            'product'=>$product,
            'relateds'=>$related,
        ]);
    }

}
