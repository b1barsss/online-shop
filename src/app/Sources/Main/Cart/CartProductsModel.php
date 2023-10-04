<?php

namespace App\Sources\Main\Cart;

use Illuminate\Database\Eloquent\Model;

class CartProductsModel extends Model
{
    protected $table = 'cart_products';
    protected $fillable = ['cart_id', 'product_id'];
}
