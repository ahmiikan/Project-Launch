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
        Schema::create('project_proposals', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->text('description');
            $table->string('attachment');
            $table->integer('days');
            $table->foreignId('freelancer_id');
            $table->foreignId('project_id');
            $table->smallInteger('status')->default(1)->comment('0: pending, 1: accepted , 2: cancelled');
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
        Schema::dropIfExists('project_proposals');
    }
};
