<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersAddresses extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function scopeIsEnable($query)
    {
        return $query->where('isDelete',0);
    }

    public function changeDefaultAddress($user,$id)
    {
        $address=$this->find($id);
        if($address->user_id==$user){
            $this->where('user_id','=',$user)->update(['default'=>0]);
            $this->where('id',$id)->update(['default'=>1]);
            return true;
        }
        else
            return false;

    }
}
