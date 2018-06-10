<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsAddress extends Model
{
    public function scopeIsEnable($query)
    {
        return $query->where('isDelete',0);
        //return static::where('isDelete',0)->get();
    }
}
