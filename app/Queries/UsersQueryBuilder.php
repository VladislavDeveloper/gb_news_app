<?php

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class UsersQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return User::query();
    }

    public function getAll(): Collection
    {
        return User::all();
    }
}