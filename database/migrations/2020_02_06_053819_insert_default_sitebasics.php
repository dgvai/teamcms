<?php

use App\Models\Entities\SiteBasics;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertDefaultSitebasics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $site = new SiteBasics;
        $site->name = 'TEAMCMS';
        $site->fullname = 'TEAMCMS Laravel';
        $site->tagline = 'A simple Laravel CMS to manage your Team!';
        $site->logo = 'default-logo.png';
        $site->logo_alt = 'default-logo-alt.png';
        $site->favicon = 'default-favicon.png';
        $site->short_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
        $site->theme_color_primary = '#e53935';
        $site->theme_color_secondary = '#10161A';
        $site->home_banner = 'default-home-banner.jpg';
        $site->about_banner = 'default-about-banner.jpg';
        $site->contacts = json_encode(['phone' => '01700 000 000', 'email' => 'defaultemail@mail.com', 'address' => 'Default Address Location, City, Country']);
        $site->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
