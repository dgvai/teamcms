<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_basics',function(Blueprint $table){
            $table->dropColumn('socials');
            $table->dropColumn('about');
        });
        
        Schema::create('site_socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('url');
            $table->string('icon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_socials');
    }
}
