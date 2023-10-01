<?php

namespace Database\Seeders;

use App\Sources\Catalogs\UserRole\UserRoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedCatalogUserRolesTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!is_null(UserRoleModel::find(2))) {
            dd('You have already run this command!');
            return;
        }

        $userRoles = [
            ['name' => 'Admin',],
            ['name' => 'Customer'],
        ];

        // Insert the data into the database
        foreach ($userRoles as $userRole) {
            UserRoleModel::create($userRole);
        }
    }
}
