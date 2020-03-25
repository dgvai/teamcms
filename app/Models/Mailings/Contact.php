<?php

namespace App\Models\Mailings;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function scopeNew($q)
    {
        return $q->where('seen',0);
    }
}
