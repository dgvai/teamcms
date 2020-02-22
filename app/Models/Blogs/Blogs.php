<?php

namespace App\Models\Blogs;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $dates = ['created_at'];

    public function seo()
    {
        return $this->hasOne('App\Models\SEO\SeoBlog','blog_id','id');
    }

    public function author()
    {
        return $this->hasOne('App\Models\Team\User','id','user_id');
    }

    public function getIsNewAttribute()
    {
        return ($this->created_at->diffInDays(Carbon::now()) < 7) ? true : false;
    }
}
