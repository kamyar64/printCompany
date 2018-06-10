<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVolumeType extends Model
{
    public function Product()
    {
        $this->hasMany(Product::class);
    }

    public function scopeIsEnable($query)
    {
        return $query->where('isDelete',0);
        //return static::where('isDelete',0)->get();
    }
}
