<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsFinishColumnToStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->tinyInteger('is_finish')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('stories', 'is_finish')) {
            Schema::table('stories', function (Blueprint $table) {
                $table->dropColumn('is_finish');
            });
        }
    }
}
