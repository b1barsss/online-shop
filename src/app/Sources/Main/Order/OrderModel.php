<?php

namespace App\Sources\Main\Order;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'catalog_order_status',
        'customer_id',
        'product_id'
    ];
}
