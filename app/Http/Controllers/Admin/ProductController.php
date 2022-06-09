<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Product\ProductRequest;
//use App\Http\Services\Menu\MenuService;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductAdminService;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return view('admin.product.list',[
            'title'=>'Danh Sách Sản Phẩm',
//            'menus'=>$this->productService->getMenu(),
            'products'=>$this->productService->get(),
        ]);

    }


    public function create()
    {
        return view('admin.product.add',[
            'title'=>'Thêm mới sản phẩm',
            'menus' => $this->productService->getMenu(),
        ]);
    }

    public function store(ProductRequest $request)

    {
        $result = $this->productService->create($request);
        if($result){
            return redirect('/admin/products/list');
        }
        return redirect()->back();


    }

    public function show(Product $product)
    {
        return view('admin.product.edit',[
            'title'=>'Cập Nhật Danh Mục: '.$product['name'],
            'products'=>$this->productService->get(),// lấy list SP theo id,relationship menu ( menus(id)->product(menu_id)
            'product'=>$product, // lấy sản phẩm theo id hiện tại
            'menus'=>$this->productService->getMenu(), // lấy menu_id

        ]);
    }


    public function update(ProductRequest $request, Product $product)
    {
        $update = $this->productService->update($request, $product);
        if ($update){
            return redirect('/admin/products/list');
        }else{
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        //
    }
}
