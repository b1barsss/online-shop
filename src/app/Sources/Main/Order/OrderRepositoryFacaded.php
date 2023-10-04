<?php

namespace App\Sources\Main\Order;

use App\BIBAsys\Bases\Repository\MyRepository;
use Illuminate\Support\Facades\DB;

class OrderRepositoryFacaded extends MyRepository
{
    protected string $tableName = 'orders';

    public function useMain(): static
    {
        $this->query = DB::table($this->tableName(), 'main')
            ->addSelect(
                'main.id',
                'main.catalog_order_status',
                'main.customer_id',
                'main.product_id',
            );

        return $this;
    }

    public function addJoinProducts(): static
    {
        $this->query
            ->addSelect('product.name as product__name')
            ->addSelect('product.description as product__description')
            ->addSelect('product.price as product__price')
            ->addSelect('product.created_by as product__created_by')
            ->join('products as product', 'product.id', '=', 'main.product_id', 'inner');
        return $this;
    }
}
