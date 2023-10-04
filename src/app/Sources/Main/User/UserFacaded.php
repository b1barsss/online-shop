<?php

namespace App\Sources\Main\User;

use App\Sources\Catalogs\UserRole\UserRoleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserFacaded
{
    protected ?Model $user = null;
    protected ?int $id = 0;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->id = Auth::id();

    }

    public function user()
    {
        return $this->user;
    }

    public function id()
    {
        return $this->id;
    }

    public function isLoggedIn()
    {
        return $this->user() !== null;
    }

    public function isAdmin()
    {
        if (!$this->isLoggedIn()) {
            return false;
        }

        return $this->isRole(UserRoleEnum::ADMIN);
    }

    public function isCustomer()
    {
        if (!$this->isLoggedIn()) {
            return false;
        }

        return $this->isRole(UserRoleEnum::CUSTOMER);
    }

    public function isRole($userRole)
    {
        return $this->isLoggedIn() && $this->user()->catalog_user_role == $userRole;
    }

//
    public function isItMe($user_id)
    {
        return $this->id() == $user_id;
    }
}
