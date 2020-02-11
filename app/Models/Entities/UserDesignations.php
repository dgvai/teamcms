<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class UserDesignations extends Model
{
    public function users()
    {
        return $this->hasMany('App\Models\Team\User','designation','id');
    }
}
