<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
//        dd($result);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }
    public function update(Request  $request){
            $result = $this->cartService->update($request);

            if ($result){
                return redirect()->back();
            }
        return redirect('/carts');
    }
    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->cartService->destroy($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Đã xoá sản phẩm khỏi giỏ hàng ',
            ]);
        }
        return response()->json([
            'error'=>true,
            'message'=>'Xoá lỗi.Đang load lại trang...',

        ]);
    }

}
