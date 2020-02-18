<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = ['first_name', 'last_name'];
}
