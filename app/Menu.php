<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $appends = array('submenu');

//then
    public function getSubmenuAttribute($submenu){
        $submenu=[];
    return $submenu;
}

}
