<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Sources\Catalogs\OrderStatus\OrderStatusEnum;
use App\Sources\Main\Cart\CartModel;
use App\Sources\Main\Cart\CartProductsModel;
use App\Sources\Main\Cart\CartRepository;
use App\Sources\Main\Order\OrderModel;
use App\Sources\Main\Order\OrderRepository;
use App\Sources\Main\Product\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $ProductRepository = ProductRepository::useMain()
            ->addJoinImages()
            ->addJoinUser()
            ->get()
            ->sortBy('id')
            ->toArray();

        $OrderRepositoryQuery = OrderRepository::useMain()
            ->addJoinProducts()
            ->query();

        if (Auth::isAdmin()) {
            $OrderRepositoryQuery = $OrderRepositoryQuery->where('product.created_by', Auth::user()->id);
        } elseif (Auth::isCustomer()) {
            $OrderRepositoryQuery = $OrderRepositoryQuery->where('main.customer_id', Auth::user()->id);
        }
        $OrderRepository = $OrderRepositoryQuery
            ->get()
            ->sortBy('id')
            ->toArray();
//        dump($OrderRepository);
        return view('order.index', ['products' => $ProductRepository, 'orders' => $OrderRepository]);
    }

    public function add($user_id)
    {
        $CartRepository = CartRepository::useMain()
            ->addJoinDtProducts()
            ->query()
            ->where('main.user_id', $user_id)
            ->get();

        foreach ($CartRepository as $order) {
            OrderModel::create([
                'catalog_order_status' => OrderStatusEnum::PENDING,
                'customer_id' => $order->user_id,
                'product_id' => $order->dt__product__product_id
            ]);
        }

        $dt__product__id = $CartRepository->pluck('dt__product__id');

        CartModel::where('user_id', $user_id)->delete();
        CartProductsModel::whereIn('id', $dt__product__id)->delete();

        return Redirect::to(route('cart.index'));
    }

    public function choose(Request $request, $order_id)
    {
        $catalog_order_status = $request->input('catalog_order_status');
         OrderModel::find($order_id)->update(['catalog_order_status' => $request->input('catalog_order_status')]);
//        dd($request->input('catalog_order_status'));

        return Redirect::to(route('order.index'));
    }
}
