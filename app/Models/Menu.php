<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'menu_id';
    protected $fillable = [
        'name',
        'parent_id',
        'url',
        'sort_order'
    ];

    public function categories()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'menu_id')->orderBy('sort_order', 'ASC');
    }
}
