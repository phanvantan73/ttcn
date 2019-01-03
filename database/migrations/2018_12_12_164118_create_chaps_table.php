<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chaps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default(null);
            $table->string('content')->default(null);
            $table->integer('story_id')->default(null);
            $table->tinyInteger('is_begin')->default(0);
            $table->tinyInteger('is_end')->default(0);
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
        Schema::dropIfExists('chaps');
    }
}
