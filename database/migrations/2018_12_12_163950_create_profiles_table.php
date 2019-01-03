<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->default('first name');
            $table->string('last_name')->default('last name');
            $table->string('avatar')->default('avatar.jpg');
            $table->date('birthday')->default('1995-09-29');
            $table->string('address')->default('address');
            $table->string('phone')->default('1234567890');
            $table->integer('user_id')->default(null);
            $table->tinyInteger('gender')->default(0);
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
        Schema::dropIfExists('profiles');
    }
}
