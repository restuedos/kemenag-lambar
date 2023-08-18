<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 
        'title', 
        'slug',
        'body',
        'image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSingle(Page $page)
    {
        return $page;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
