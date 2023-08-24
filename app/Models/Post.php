<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'body',
        'image',
        'status',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSingle(Post $post)
    {
        return $post;
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
