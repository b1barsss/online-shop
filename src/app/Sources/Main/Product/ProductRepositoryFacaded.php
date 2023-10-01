<?php

namespace App\Sources\Main\Product;

use App\BIBAsys\Bases\Repository\MyRepository;
use Illuminate\Support\Facades\DB;

class ProductRepositoryFacaded extends MyRepository
{
    protected string $tableName = 'products';
    public function useMain(): static {
        $this->query = DB::table($this->tableName(), 'main')
            ->addSelect(
                'main.id',
                'main.name',
                'main.description',
                'main.price',
                'main.image_id',
            );

        return $this;
    }

    public function addJoinImages(): static {
        $this->query
            ->addSelect('image.path as image__path')
            ->join('images as image', 'image.id', '=', 'main.image_id', 'left');

        return $this;
    }
}
