<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['name', 'url', 'menu_id'];
    protected $appends = ['menu_name'];
    
    public function menu() {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
    public function getMenuNameAttribute() {
        return $this->menu->name;
    }
}
