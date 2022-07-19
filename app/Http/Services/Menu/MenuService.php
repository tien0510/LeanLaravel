<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id',0)->get();
    }
    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }
    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id',$id)->first();
        if ($menu){
//            dd($menu);
            return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
        }
        return false;
    }
    public function update($request,$menu):bool
    {
        if ($menu['id'] != $request->input('parent_id')) {
            $menu['name'] = (string)$request->input('name');
            $menu['parent_id'] = (int)$request->input('parent_id');
            $menu['description'] = (string)$request->input('description');
            $menu['content'] = (string)$request->input('content');
            $menu['active'] = (int)$request->input('active');
            $menu['slug'] = Str::slug($request->input('name'), '-');
//        $menu->fill($request->input());
            $menu->save();

            Session::flash('success', 'Cập nhật danh mục thành công ');
            return true;
        }else{
            Session::flash('error', 'Danh mục được chọn là không hợp lệ');
            return false;
        }

    }

    public function create($request){
        try {
             Menu::create([
                'name'=>(string) $request->input('name'),
                'parent_id'=>(int) $request->input('parent_id'),
                'description'=>(string) $request->input('description'),
                'content'=>(string) $request->input('content'),
                'slug'=> Str::slug($request->input('name'), '-'),
                'active'=>(int) $request->input('active'),
            ]);

            Session::flash('success','Thêm danh mục mới thành công ');

        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function getId($id)
    {
        try
        {
            $a = Menu::where('parent_id',$id)->firstOrFail();;// select * from menus where id = 8 // lấy ra tên
        }
        catch(ModelNotFoundException $e)
        {
            $a = Menu::where('id',$id)->firstOrFail();
        }

        return $a;


    }

    public function getProduct($menu,$id,$request)
    {
        $query =  $menu->products()
            ->select('id', 'name', 'thumb', 'price', 'price_sale', 'slug')
            ->where('active', 1)
            ->orwhere('menu_id',$id);

        if ($request->input('price')){
//                $query->orderby('price',$request->input('price'));
                $query->orderby('price_sale',$request->input('price'));
        }

        return $query->orderbyDesc('id')->paginate(8)->withQueryString();

    }

    public function getname1($id)
    {

         return  Menu::where('id',$id)->firstOrFail();// select * from menus where id = 8 // lấy ra tên

    }

}
