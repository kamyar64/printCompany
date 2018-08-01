<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function userAddress()
    {
        return $this->belongsTo(UsersAddresses::class,'user_address');
    }
    public function Products()
    {
        return $this->hasMany(ProductsOrder::class,'order_id');
    }

    public function createOrderNumber($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        if(count($this->where('order_number',$randomString)->get())>0)
            $this->createOrderNumber($length+1);
        else
            return $randomString;
    }

    public function scopeUnreadOrders($query)
    {
        return $query->where('isDelete',false);
    }
}
