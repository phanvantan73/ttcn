<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthorIdColumnToStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->integer('author_id')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('stories', 'author_id')) {
            Schema::table('stories', function (Blueprint $table) {
                $table->dropColumn('author_id');
            });
        }
    }
}
