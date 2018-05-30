<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'news_user_insert');
    }
    public function Department()
    {
        return $this->belongsTo(Department::class,'department');
    }
    public function NewsGroup()
    {
        return  $this->belongsTo(NewsGroup::class,'news_group');
    }
    public function Priority()
    {
        return  $this->belongsTo(Priority::class,'news_priority');
    }
}
