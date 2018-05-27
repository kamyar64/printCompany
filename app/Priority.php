<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    public function News()
    {
        $this->hasMany(News::class);
    }
}
