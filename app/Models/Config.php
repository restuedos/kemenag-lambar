<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'logo',
        'footer_text',
        'ministry_name',
        'phone',
        'email',
        'address',
        'long',
        'lat',
        'copyright'
    ];                
}
