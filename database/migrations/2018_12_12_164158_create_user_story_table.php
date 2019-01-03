<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_story', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(null);
            $table->integer('story_id')->default(null);
            $table->string('reading_chap')->default(null);
            $table->dateTime('last_reading');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_story');
    }
}
