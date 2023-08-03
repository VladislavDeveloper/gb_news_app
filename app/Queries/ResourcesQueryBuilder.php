<?php

namespace App\Queries;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class ResourcesQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Resource::query();
    }

    public function getAll(): Collection
    {
        return Resource::all();
    }
}