<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsername extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //追加したいものはup()
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            //user_nameカラムを追加
            $table->string('user_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */


     //削除したいものはdown()
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
}
