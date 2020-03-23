<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class SiteBasics extends Model
{
    public function getExtraInfosAttribute()
    {
        return json_decode(($this->ext_infos == null) ? '[]' : $this->ext_infos);
    }

    public function getSocialLinksAttribute()
    {
        return json_decode(($this->ext_socials == null) ? '[]' : $this->ext_socials);
    }

    public function getMetaTitlesAttribute()
    {
        return json_decode(($this->meta_page_titles == null) ? '[]' : $this->meta_page_titles);
    }

    public function getContactDataAttribute()
    {
        return json_decode(($this->contacts == null) ? '[]' : $this->contacts);
    }
}
