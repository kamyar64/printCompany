<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsTellAndEmail extends Model
{
    public function scopeIsTell($query)
    {
        return $query->where('type',0);
    }
    public function scopeIsEmail($query)
    {
        return $query->where('type',1);
    }
}
