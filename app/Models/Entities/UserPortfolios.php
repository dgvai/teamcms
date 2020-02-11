<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class UserPortfolios extends Model
{
    public function user()
    {
        return $this->hasOne('App\Models\Team\User','id','user_id');
    }
}
