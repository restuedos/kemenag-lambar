<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'name',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function getSingle(PostCategory $category)
    {
        return $category;
    }
}
