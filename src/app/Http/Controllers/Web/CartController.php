<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Sources\Main\Cart\CartModel;
use App\Sources\Main\Cart\CartProductsModel;
use App\Sources\Main\Cart\CartRepository;
use App\Sources\Main\Product\ProductRepository;
use App\Sources\Main\User\User;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $CartRepository = CartRepository::useMain()
            ->addJoinDtProducts()
            ->addProductsInfo()
            ->query()
            ->where('main.user_id', User::id())
            ->get()
            ->sortBy('id');
        $productCount = $CartRepository->count();

        return view('cart.index', ['products' => $CartRepository, 'productCount' => $productCount]);
    }

    public function add($product_id) {
        $user = User::user();
        $CartModel = CartModel::where('user_id', '=', $user->id)->first();
        if (is_null($CartModel)) {
            $CartModel = CartModel::create(['user_id' => $user->id]);
        }
        $CartProductsModel = CartProductsModel::create(['cart_id' => $CartModel->id, 'product_id' => $product_id]);

        return Redirect::to(route('product.index'));
    }

    public function remove($dt__product__id) {
        CartProductsModel::find($dt__product__id)?->delete();
        return Redirect::to(route('cart.index'));
    }
}
