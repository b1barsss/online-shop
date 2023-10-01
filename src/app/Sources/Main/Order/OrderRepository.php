<?php

namespace App\Sources\Main\Order;

use App\BIBAsys\Bases\Facade\MyFacade;
use App\Sources\Main\Order\OrderRepositoryFacaded as Facaded;

class OrderRepository extends MyFacade
{
    protected static function getFacadeAccessor()
    {
        return Facaded::class;
    }
}
