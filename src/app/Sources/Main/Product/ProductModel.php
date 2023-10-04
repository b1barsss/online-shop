<?php

namespace App\Sources\Main\Product;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_id',
        'created_by'
    ];
}
