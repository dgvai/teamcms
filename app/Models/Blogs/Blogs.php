<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    public function seo()
    {
        return $this->hasOne('App\Models\SEO\SeoBlog','blog_id','id');
    }
}
