<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'infos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'title',
        'link'
    ];

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function getSingle(Info $info)
    {
        return $info;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
