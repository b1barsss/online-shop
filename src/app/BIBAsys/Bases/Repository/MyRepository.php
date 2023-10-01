<?php

namespace App\BIBAsys\Bases\Repository;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class MyRepository
{
    protected string $tableName;
    protected string $tableAlias = 'main';
    protected string $tableKey = 'id';
    protected ?Builder $query = null;

    public function __construct()
    {
        if (method_exists($this, 'useMain')) {
            $this->useMain();
        }
    }
    public function tableName(): string
    {
        return $this->tableName;
    }

    public function tableAlias(): string
    {
        return $this->tableAlias;
    }

    public function tableKey(): string
    {
        return $this->tableKey;
    }

    public function tableAliasDot(): string
    {
        return $this->tableAlias() . '.';
    }

    public function query(): Builder
    {
        return $this->query;
    }

    public function whereKey(mixed $id): static
    {
        $this->query()
            ->where($this->tableAliasDot() . $this->tableKey(), '=', $id);

        return $this;
    }

    public function get(): Collection
    {
        return $this->query
            ->get();
    }

    public function first(): object|null
    {
        return $this
            ->query()
            ->first();
    }

    public function find(mixed $id): object|null
    {
        return $this
            ->whereKey($id)
            ->query()
            ->first();
    }

}
