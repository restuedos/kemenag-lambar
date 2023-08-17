<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'name',
        'parent_id',
        'url',
        'sort_order'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'category_id')->orderBy('sort_order', 'ASC');
    }
}
