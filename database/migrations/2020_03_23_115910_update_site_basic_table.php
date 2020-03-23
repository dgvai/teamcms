<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateSiteBasicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_basics',function(Blueprint $table){
            $table->string('home_counter_bg')->after('about_banner')->nullable();
        });
        DB::table('site_basics')->where('id',1)->update(['home_counter_bg' => 'default-home-counter-bg.jpg']);
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
