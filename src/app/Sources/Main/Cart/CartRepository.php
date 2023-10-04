<?php

namespace App\Sources\Main\Cart;

use App\BIBAsys\Bases\Facade\MyFacade;
use App\Sources\Main\Cart\CartRepositoryFacaded as Facaded;
class CartRepository extends MyFacade
{
    protected static function getFacadeAccessor()
    {
        return Facaded::class;
    }
}
