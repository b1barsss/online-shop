<?php

namespace App\Sources\Main\Cart;


use App\BIBAsys\Bases\Repository\MyRepository;
use Illuminate\Support\Facades\DB;

class CartRepositoryFacaded extends MyRepository
{
    protected string $tableName = 'carts';

    public function useMain(): static {
        $this->query = DB::table($this->tableName(), 'main')
            ->addSelect(
                'main.id',
                'main.user_id',
            );

        return $this;
    }

    public function addJoinDtProducts(): static {
        $this->query
//            ->addSelect('dt__product.product_id as dt__product__product_id')
            ->addSelect('dt__product.id as dt__product__id')
            ->join('cart_products as dt__product', 'dt__product.cart_id', '=', 'main.id', 'inner');

        return $this;
    }

    public function addProductsInfo(): static {
        $this->query
            ->addSelect('product.id as product__id')
            ->addSelect('product.name as product__name')
            ->addSelect('product.description as product__description')
            ->addSelect('product.price as product__price')
            ->join('products as product', 'product.id', '=', 'dt__product.product_id', 'left');

        return $this;
    }
}
