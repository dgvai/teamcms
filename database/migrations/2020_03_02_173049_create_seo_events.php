<?php

use App\Models\Events\Events;
use App\Models\SEO\SeoEvent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $events = Events::all();
        foreach($events as $event)
        {
            $seo = new SeoEvent();
            $seo->title = $event->title;
            $seo->event_id = $event->id;
            $seo->text = htmlentities(mb_substr(strip_tags($event->post),0,154)).'...';
            $seo->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
