<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class SiteBulletines extends Model
{
    public function scopeActive($q)
    {
        return $q->where('state',1)->orderBy('created_at','desc');
    }
}
