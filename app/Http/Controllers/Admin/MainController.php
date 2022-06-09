<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductAdminService;

class MainController extends Controller
{
    protected $productService;
    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return view('admin.product.list',[
            'title'=>'Trang quản trị',
//            'menus'=>$this->productService->getMenu(),
            'products'=>$this->productService->get(),
        ]);

    }
}
