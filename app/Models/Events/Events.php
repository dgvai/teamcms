<?php

namespace App\Models\Events;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $dates = ['single_time','multi_start_time','multi_end_time','created_at'];

    /* **** relations **** */

    public function seo()
    {
        return $this->hasOne('App\Models\SEO\SeoEvent','event_id','id');
    }

    public function postevent()
    {
        return $this->hasOne('App\Models\Events\PostEventPost','event_id','id');
    }

    /* **** attributes **** */

    public function getIsUpcomingAttribute()
    {
        if($this->multi == 0)
        {
            if($this->single_time->greaterThanOrEqualTo(Carbon::today()))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            if($this->multi_start_time->greaterThanOrEqualTo(Carbon::today()))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function getHasPostAttribute()
    {
        return (isset($this->postevent));
    }

    /* **** scopes **** */

    public function scopeUpcomings($query)
    {
        return $query->whereDate('single_time','>=',Carbon::today())->orWhereDate('multi_start_time','>=',Carbon::today());
    }
}
