<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsGroup extends Model
{
    public function News()
    {
        $this->hasMany(News::class);
    }
}
