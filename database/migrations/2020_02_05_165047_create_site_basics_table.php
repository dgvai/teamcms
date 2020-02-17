<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_basics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fullname')->nullable();
            $table->string('tagline')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_alt')->nullable();
            $table->string('favicon')->nullable();
            $table->text('short_description')->nullable();
            $table->text('about')->nullable();
            $table->text('socials')->nullable();
            $table->string('theme_color_primary')->nullable();
            $table->string('theme_color_secondary')->nullable();
            $table->string('home_banner')->nullable();
            $table->string('about_banner')->nullable();
            $table->text('meta_page_titles')->nullable();
            $table->text('contacts')->nullable();
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
        Schema::dropIfExists('site_basics');
    }
}
