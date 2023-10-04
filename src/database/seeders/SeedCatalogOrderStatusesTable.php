<?php

namespace Database\Seeders;

use App\Sources\Catalogs\OrderStatus\OrderStatusModel;
use App\Sources\Catalogs\UserRole\UserRoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedCatalogOrderStatusesTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!is_null(OrderStatusModel::find(3))) {
            dump('You have already run this command!');
            return;
        }

        $orderStatuses = [
            ['name' => 'Declined',],
            ['name' => 'Pending'],
            ['name' => 'Confirmed'],
        ];

        // Insert the data into the database
        foreach ($orderStatuses as $orderStatus) {
            OrderStatusModel::create($orderStatus);
        }
    }
}
