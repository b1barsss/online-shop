@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-wrapper text-center d-flex justify-content-between">
                            <div class="h4">Products</div>
                            @if(\Illuminate\Support\Facades\Auth::isAdmin())
                                <a href="{{ route('product.create') }}" class="btn btn-outline-success">Add Product</a>
                            @endif
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-md-4 mb-3">
                                        <div class="item">
                                            <div class="card bg-red">
                                                <div class="card-header">
                                                    <div class="btn-wrapper text-center d-flex justify-content-between">
                                                        <div>
                                                            <a href="{{ route('product.show', ['product_id' => $product->id]) }}" class="text-dark">
                                                                <?= $product->name . " ($product->user__name)" ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <?= "\${$product->price}" ?>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="btn-wrapper text-center d-flex justify-content-between">
                                                        @if(\Illuminate\Support\Facades\Auth::isAdmin() and \Illuminate\Support\Facades\Auth::isItMe($product->created_by))
                                                            <form action="{{ route('product.destroy', ['product_id' => $product->id]) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-danger btn-sm text-white d-flex align-items-center"
                                                                    onclick="return confirm('Are you sure?')"
                                                                >Delete</button>
                                                            </form>
                                                            <a href="{{ route('product.edit', ['product_id' => $product->id]) }}" class="btn btn-sm btn-warning" style="">Edit</a>
                                                        @elseif(\Illuminate\Support\Facades\Auth::isCustomer())
                                                            <a href="{{ route('cart.add', ['product_id' => $product->id]) }}" class="btn btn-sm btn-success" style="">Add to cart</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
