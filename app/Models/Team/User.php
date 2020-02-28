<?php

namespace App\Models\Team;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

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

    public function blogs()
    {
        return $this->hasMany('App\Models\Blogs\Blogs','user_id','id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->details->first_name} {$this->details->last_name}";
    }

    public function getDisplayPhotoAttribute()
    {
        return ($this->details->avatar == null) ? 'default-photo.jpg' : $this->details->avatar;
    }

    public function getConnectionsAttribute()
    {
        return json_decode(($this->details->socials == null) ? '[]' : $this->details->socials);
    }
}
