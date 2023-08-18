<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
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

    public function getSingle(Slider $slider)
    {
        return $slider;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
