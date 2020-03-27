<?php

namespace App\Models\Team;

use App\Models\Entities\SiteBasics;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['email', 'password','roll_id'];
    protected $hidden = ['password', 'remember_token',];
    protected $casts = ['email_verified_at' => 'datetime',];

    /*  **** relations **** */

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

    /*  **** attributes **** */

    public function getFullNameAttribute()
    {
        return "{$this->details->first_name} {$this->details->last_name}";
    }

    public function getDisplayPhotoAttribute()
    {
        return ($this->details->avatar == null) ? 'default-photo.jpg' : $this->details->avatar;
    }

    public function getCoverPhotoAttribute()
    {
        return ($this->details->cover == null) ? 'default-user-cover.jpg' : $this->details->cover;
    }

    public function getConnectionsAttribute()
    {
        return json_decode(($this->details->socials == null) ? '[]' : $this->details->socials);
    }

    public function getAboutAttribute()
    {
        return ($this->details->about == null) ? 'I am very busy to change my about...' : $this->details->about;
    }

    public function getIsAlumniAttribute()
    {
        return $this->status == 5 ? true : false;
    }

    public function getCurrentDesignationAttribute()
    {
        return $this->is_alumni ? 'Former '.$this->desig->name : $this->desig->name;
    }

    public function getIsRootUserAttribute()
    {
        return ($this->roll_id == 0) ? true : false;
    }

    public function getExtrasAttribute()
    {
        return json_decode(($this->details->extras == null) ? '[]' : $this->details->extras);
    }

    public function getExtraByKey($key)
    {
        $extras_array = json_decode(($this->details->extras == null) ? '[]' : $this->details->extras);
        $key = array_search($key,array_column($extras_array,'key'));
        return ($key !== false) ? $extras_array[$key]->value : false;
    }

    public function getSocialByKey($key)
    {
        $socials_array = json_decode(($this->details->socials == null) ? '[]' : $this->details->socials);
        $key = array_search($key,array_column($socials_array,'name'));
        return ($key !== false) ? $socials_array[$key]->url : false;
    }


    /*  **** scopes **** */

    public function scopeNew($query)
    {
        return $query->where('status',0)->where('roll_id','!=',0);
    }

    public function scopeTotal($query)
    {
        return $query->where('status',1)->where('roll_id','!=',0);
    }

    public function scopeCommittee($query)
    {
        return $query->where('designation','!=',SiteBasics::first()->member_rank)->where('designation','!=','0')->where('status',1);
    }

    public function scopeCurrent($query)
    {
        return $query->where('status',1)->where('roll_id','!=',0)->where('designation','!=',0);
    }

    public function scopeMembers($query)
    {
        return $query->where('designation',SiteBasics::first()->member_rank)->where('status',1);
    }

    public function scopeAlumnis($query)
    {
        return $query->where('status',5);
    }

    public function scopeRejecteds($query)
    {
        return $query->where('status',9);
    }

    public function scopeUnassigned($query)
    {
        return $query->where('designation',0)->where('status',1)->where('roll_id','>',0);
    }

    public function scopeRoll($query,$roll)
    {
        return $query->where('roll_id',$roll);
    }

    public function scopeGlobal($query)
    {
        return $query->where('status','!=',9)->where('roll_id','!=',0);
    }
}
