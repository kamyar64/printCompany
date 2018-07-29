<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    public $table = "contact_uses";

    public function MainAddress()
    {
        return $this->belongsTo('App\ContactUsAddress','main_address');
    }

}
