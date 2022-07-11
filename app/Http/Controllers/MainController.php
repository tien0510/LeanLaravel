<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;

class MainController extends Controller
{
    protected $slider;
    protected $product;

    public function __construct(SliderService $sliderService, ProductService $productService)
    {
        $this->slider = $sliderService;
        $this->product = $productService;

    }

    public function index()
    {
        return view('home', [
            'title' => 'TClothes Home',
            'sliders' => $this->slider->show(),
            'products' => $this->product->getProduct(),

        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page',0);
        $result = $this->product->getProduct($page);
//        dd($result);
        if(count($result) != 0){
            $html = view('products.list',['products'=>$result])->render();
            return \response()->json(['html'=> $html]);
        }
        return \response()->json(['html'=>'']);
    }
}
