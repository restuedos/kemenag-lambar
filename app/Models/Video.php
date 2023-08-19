<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'title',
        'caption',
        'image',
        'link'
    ];
}
