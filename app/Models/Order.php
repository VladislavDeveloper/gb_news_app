<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    public function getOrders(): Collection
    {
        return DB::table($this->table)->get();
    }

    public function getOrderById(int $id)
    {
        return DB::table($this->table)->find($id);
    }
}
