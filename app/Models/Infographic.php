<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infographic extends Model
{
    protected $table = 'infographics';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'title',
        'image'
    ];
}
