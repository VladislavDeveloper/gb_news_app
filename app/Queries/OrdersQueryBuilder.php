<?php

namespace App\Queries;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class OrdersQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Order::query();
    }

    public function getAll(): Collection
    {
        return Order::all();
    }
}