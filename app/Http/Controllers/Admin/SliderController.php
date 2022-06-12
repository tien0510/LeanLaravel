<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;


class SliderController extends Controller
{
    protected $sliderSerivce;
    public function __construct(SliderService $sliderSerivce)
    {
        $this->sliderSerivce = $sliderSerivce;
    }
    public function create()
    {
        return view('admin.slider.add',[
            'title'=>'Thêm slider mới',
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'thumb'=>'required',
            'url'=>'required',
        ]);
        $result = $this->sliderSerivce->create($request);
        if($result){
            return redirect('/admin/sliders/list');
        }
        return redirect()->back();
    }
    public function index(){
        return view('admin.slider.list',[
            'title'=>'Danh Sách Slider',
            'sliders'=> $this->sliderSerivce->getSlider(),
        ]);
    }
    public function show(Slider $slider){
        return view('admin.slider.edit',[
            'title'=>'Cập Nhật Danh Sách Slider: '.$slider->name,
            'sliders'=> $slider,

        ]);
    }
    public function update(Request $request,Slider $slider){
        $this->validate($request,[
            'name'=>'required',
            'thumb'=>'required',
            'url'=>'required',
        ]);
        $update = $this->sliderSerivce->update($request, $slider);
        if ($update){
            return redirect('/admin/sliders/list');
        }else{
            return redirect()->back();
        }
    }
    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->sliderSerivce->destroy($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Đã xoá slider ',
            ]);
        }
        return response()->json([
            'error'=>true,
            'message'=>'Xoá lỗi.Đang load lại trang...',

        ]);
    }
}
