<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFanpageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fanpage', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('fanpage_id');
            $table->string('fanpage_name');
            $table->string('fanpage_id_token');
            $table->string('fanpage_id_career');
            $table->text('fanpage_user');
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
        Schema::dropIfExists('fanpage');
    }
}
