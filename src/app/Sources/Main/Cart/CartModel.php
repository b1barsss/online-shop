<?php

namespace App\Sources\Main\Cart;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $fillable = ['user_id'];
}
