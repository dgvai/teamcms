<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('poster')->nullable();
            $table->longText('post')->nullable();
            $table->integer('multi')->default(0);
            $table->string('single_time')->nullable();
            $table->string('multi_start_time')->nullable();
            $table->string('multi_end_time')->nullable();
            $table->string('place')->nullable();
            $table->text('links')->nullable();
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
        Schema::dropIfExists('events');
    }
}
