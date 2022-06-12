<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
       return view('admin.menu.add',[
           'title'=>'Thêm Danh Mục Mới',
           'menus' => $this->menuService->getParent(),
       ]);

    }
  public function store(CreateFormRequest $request)
  {
      $result = $this->menuService->create($request);
      if($result){
          return redirect('/admin/menus/list');
      }
      return redirect()->back();


  }
    public function index()
    {
        return view('admin.menu.list',[
           'title'=>'Danh Sách Danh Mục',
            'menus'=>$this->menuService->getAll(),
        ]);
    }
    public function show(Menu $menu)
    {
        return view('admin.menu.edit',[
            'title'=>'Cập Nhật Danh Mục: '.$menu['name'],
            'menus'=>$this->menuService->getParent(),
            'menu'=>$menu,
        ]);
    }
    public function update(Menu $menu,CreateFormRequest $request)
    {
        $update = $this->menuService->update($request, $menu);
        if ($update){
            return redirect('/admin/menus/list');
        }else{
        return redirect()->back();
        }
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Đã xoá danh mục',
            ]);
        }
        return response()->json([
            'error'=>true,
            'message'=>'Xoá thất bại.Hãy thử lại',
        ]);
    }

}
