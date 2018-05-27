<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function News()
    {
        $this->hasMany(News::class);
    }
}
