<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $appends = array('submenu');

//then
    public function getSubmenuAttribute($submenu)
    {
        $submenu=[];
    return $submenu;
    }

    public function MenuText()
    {
        return $this->hasOne(MenuText::class);
    }

    public function scopeIsEnable($query)
    {
        return $query->where('isDelete',0);
        //return static::where('isDelete',0)->get();
    }
}
