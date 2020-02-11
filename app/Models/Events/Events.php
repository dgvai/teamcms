<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public function seo()
    {
        return $this->hasOne('App\Models\SEO\SeoEvent','event_id','id');
    }
}
