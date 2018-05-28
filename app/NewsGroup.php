<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsGroup extends Model
{
    public function News()
    {
        $this->hasMany(News::class);
    }

    public function scopeIsEnable($query)
    {
        return $query->where('isDelete',0);
        //return static::where('isDelete',0)->get();
    }

}
