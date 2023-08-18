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

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function getSingle(Infographic $infographic)
    {
        return $infographic;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
