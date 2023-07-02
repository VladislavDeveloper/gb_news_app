<?php

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class CategoriesQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Category::query();
    }

    public function getAll(): Collection
    {
        return Category::all();
    }

    // public function destroy($id)
    // {
    //     return Category::destroy($id);
    // }
}
