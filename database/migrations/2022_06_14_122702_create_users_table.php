<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('image');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('password');
            $table->string('email', 50)->unique();
            $table->foreignId('country_id');
            $table->string('gender');
            $table->boolean('status')->default(1)->comment('0: inactive, 1: active');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

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
};
