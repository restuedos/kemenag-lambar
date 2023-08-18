<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'title',
        'caption',
        'image',
        'link'
    ];

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function getSingle(Service $service)
    {
        return $service;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
