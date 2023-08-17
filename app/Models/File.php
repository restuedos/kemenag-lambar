<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'title',
        'file_name'
    ];
}
