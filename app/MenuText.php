<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuText extends Model
{
    public function Menu()
    {
        return $this->hasOne(Menu::class,'id');
    }
}
