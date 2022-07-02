<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;

class MainController extends Controller
{
    protected $slider;
    protected $product;
    public function __construct(SliderService $sliderService,ProductService $productService)
    {
        $this->slider  = $sliderService;
        $this->product = $productService;

    }

    public function index(){
        return view('main',[
            'title'=>'TClothes Home',
            'sliders'=>$this->slider->getSlider(),
            'products'=>$this->product->getProduct(),

        ]);
    }
}
