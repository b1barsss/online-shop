<?php

namespace App\Sources\Catalogs\UserRole;

use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends Model
{
    protected $table = 'catalog_user_roles';

    protected $fillable = [
        'id',
        'name'
    ];
}
