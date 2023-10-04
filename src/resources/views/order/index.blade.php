@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-wrapper text-center d-flex justify-content-between">
                            <div class="h4">Orders</div>
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($orders as $order)
                                    <div class="col-md-4 mb-3">
                                        <div class="item">
                                            <div class="card bg-red">
                                                <div class="card-header">
                                                    <div class="btn-wrapper text-center d-flex justify-content-between">
                                                        <div>
                                                            <a href="{{ route('product.show', ['product_id' => $order->product_id]) }}" class="text-dark">
                                                                <?= $order->product__name ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <?= "\${$order->product__price}" ?>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="btn-wrapper text-center d-flex justify-content-between">
                                                        @if (\App\Sources\Main\User\User::isCustomer() or $order->catalog_order_status != \App\Sources\Catalogs\OrderStatus\OrderStatusEnum::PENDING)
                                                            <div><?= 'Status: ' ?>
                                                                @if($order->catalog_order_status == \App\Sources\Catalogs\OrderStatus\OrderStatusEnum::DECLINED)
                                                                    <span class="text-danger"><?=  \App\Sources\Catalogs\OrderStatus\OrderStatusModel::find($order->catalog_order_status)->name ?></span>
                                                                @elseif($order->catalog_order_status == \App\Sources\Catalogs\OrderStatus\OrderStatusEnum::CONFIRMED)
                                                                    <span class="text-success"><?=  \App\Sources\Catalogs\OrderStatus\OrderStatusModel::find($order->catalog_order_status)->name ?></span>
                                                                @else
                                                                    <span class="text-primary"><?=  \App\Sources\Catalogs\OrderStatus\OrderStatusModel::find($order->catalog_order_status)->name ?></span>
                                                                @endif
                                                            </div>
                                                        @endif

                                                        @if(\App\Sources\Main\User\User::isAdmin() and $order->catalog_order_status == \App\Sources\Catalogs\OrderStatus\OrderStatusEnum::PENDING)
                                                            <a href="{{ route('order.choose', ['order_id' => $order->id, 'catalog_order_status' => \App\Sources\Catalogs\OrderStatus\OrderStatusEnum::DECLINED]) }}" class="btn btn-sm btn-danger" style="">Decline</a>
                                                            <a href="{{ route('order.choose', ['order_id' => $order->id, 'catalog_order_status' => \App\Sources\Catalogs\OrderStatus\OrderStatusEnum::CONFIRMED]) }}" class="btn btn-sm btn-success" style="">Confirm</a>
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
