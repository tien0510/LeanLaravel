<?php

namespace App\Http\Controllers\Admin;
use App\Http\Services\Menu\MenuService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index()
    {

    }


    public function create()
    {
        return view('admin.product.add',[
            'title'=>'Thêm mới sản phẩm',
            'menus' => $this->menuService->getAll(),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
