<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'category_to_news', 'category_id', 'news_id');
    }
    
}
