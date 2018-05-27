<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function department()
    {
        $this->belongsTo(Department::class);
    }
    public function NewsGroup()
    {
        $this->belongsTo(NewsGroup::class);
    }
    public function Priority()
    {
        $this->belongsTo(Priority::class);
    }
}
