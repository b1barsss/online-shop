<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Sources\Main\Product\ProductModel;
use App\Sources\Main\Product\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
//        dd($ProductRepository);
        return view('product.index', ['products' => $ProductRepository]);
    }

    public function show($product_id)
    {
        $ProductRepository = ProductRepository::useMain()
            ->addJoinImages()
            ->whereKey($product_id)
            ->first();
        return view('product.show', ['product' => $ProductRepository]);
    }

    public function destroy($product_id)
    {
        ProductModel::destroy($product_id);

        session()->flash('success', 'Product deleted successfully.');
        return Redirect::to(route('product.index'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            session()->flash('danger', implode(' | ', array_map(fn($item) => $item[0], $validator->errors()->getMessages())));
            return Redirect::to(route('product.create'));
//            return $this->sendError('Validation Error.', $validator->errors());
        }

        $request_all = $request->all();
        $request_all['created_by'] = Auth::user()->id;
        $product_id = ProductModel::create($request_all);
        session()->flash('success', 'Product created successfully.');
        return Redirect::to(route('product.show', ['product_id' => $product_id]));
    }

    public function edit($product_id)
    {
        $ProductRepository = ProductRepository::useMain()
            ->addJoinImages()
            ->whereKey($product_id)
            ->first();
        return view('product.edit', ['product' => $ProductRepository]);
    }

    public function update(Request $request, $product_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            session()->flash('danger', implode(' | ', array_map(fn($item) => $item[0], $validator->errors()->getMessages())));
            return Redirect::to(route('product.edit', ['product_id' => $product_id]));
//            return $this->sendError('Validation Error.', $validator->errors());
        }

        ProductModel::find($product_id)->update($request->all());
        session()->flash('success', 'Product updated successfully.');
        return Redirect::to(route('product.show', ['product_id' => $product_id]));
    }
}
