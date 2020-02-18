<?php

namespace App\Models\Team;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password','roll_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime',];

    public function desig()
    {
        return $this->hasOne('App\Models\Entities\UserDesignations','id','designation');
    }

    public function details()
    {
        return $this->hasOne('App\Models\Entities\UserDetails','user_id','id');
    }

    public function portfolios()
    {
        return $this->hasMany('App\Models\Entities\UserPortfolios','user_id','id');
    }
}
