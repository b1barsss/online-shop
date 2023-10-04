<?php

namespace App\Sources\Main\User;

use App\BIBAsys\Bases\Facade\MyFacade;
use App\Sources\Main\User\UserFacaded as Facaded;

class User extends MyFacade
{
    protected static function getFacadeAccessor()
    {
        return Facaded::class;
    }
}
