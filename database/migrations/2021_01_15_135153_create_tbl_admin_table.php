<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
<<<<<<< HEAD
            $table->string('remember_token')->nullable();
=======
>>>>>>> dcaf6e5a2d4cfefce7bb1f1b5acf5dffbc3b11ff
            $table->string('token')->nullable();
            $table->string('note')->nullable();
            $table->string('facebook_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('number')->nullable();
            $table->integer('role_id')->nullable();
            $table->text('message_long')->nullable();
            $table->string('utk')->nullable();
            $table->string('uck')->nullable();
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
        Schema::dropIfExists('users');
    }
}
