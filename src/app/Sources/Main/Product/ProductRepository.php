<?php

namespace App\Sources\Main\Product;

use App\BIBAsys\Bases\Facade\MyFacade;
use App\Sources\Main\Product\ProductRepositoryFacaded as Facaded;
class ProductRepository extends MyFacade
{
    protected static function getFacadeAccessor()
    {
        return Facaded::class;
    }
}
