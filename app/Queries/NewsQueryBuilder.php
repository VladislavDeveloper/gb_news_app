<?php

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class NewsQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return News::query();
    }

    public function getAll(): Collection
    {
        return News::all();
    }
}