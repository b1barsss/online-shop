@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-wrapper text-center d-flex justify-content-between">
                            <div class="h4">Cart</div>
                            @if($productCount > 0)
                                <a href="{{ route('order.add', ['user_id' => \App\Sources\Main\User\User::id()]) }}" class="btn btn-outline-success">Send Orders</a>
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
                                                            <a href="{{ route('product.show', ['product_id' => $product->product__id]) }}" class="text-dark">
                                                                <?= $product->product__name ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <?= "\${$product->product__price}" ?>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="btn-wrapper text-center d-flex justify-content-between">
                                                        <form action="{{ route('cart.remove', ['dt__product__id' => $product->dt__product__id]) }}">
                                                            @csrf
                                                            <button
                                                                type="submit"
                                                                class="btn btn-secondary btn-sm text-white d-flex align-items-center"
                                                                onclick="return confirm('Are you sure?')"
                                                            >Remove</button>
                                                        </form>
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
