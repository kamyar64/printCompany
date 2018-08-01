<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsOrder extends Model
{
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function Orders()
    {
        return $this->belongsTo(Orders::class,'order_id');
    }

}
