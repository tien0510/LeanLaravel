<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function create($request){
        try {
            Slider::create($request->input());
            Session::flash('sucess','Thêm Slider mới thành công');
            return true;

        }catch (\Exception $err){
            Session::flash('error','Thêm Slider Lỗi');
            return false;
        }
    }
    public function getSlider(){
        return Slider::orderbyDesc('id')->paginate(15);
    }
    public function update($request, $slider){
    try{
        $slider->fill($request->input());
        $slider->save();

        Session::flash('success', 'Cập nhật slider thành công ');
        return true;
    }catch (\Exception $err){
        Session::flash('error', 'Cập nhật Slider Lỗi');
        return false;
    }
    }
    public function destroy($request){
        $id = (int) $request->input('id');//main.js(8,13)
        $slider = Slider::where('id',$id)->first();
        if ($slider){
//            return Slider::where('id',$id)->delete();
            $path = str_replace('storage','public',$slider->thumb);
            Storage::delete($path);
            Slider::where('id',$id)->delete();
            return true ;
        }
        return false;
    }



}
