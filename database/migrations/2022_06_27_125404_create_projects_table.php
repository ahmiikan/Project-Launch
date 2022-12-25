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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->smallInteger('status')->default(0)->comment('0 = Pending, 1 = Approved, 2 = Canceled, 3 = In Progress, 4 = Completed');
            $table->double('budget');
            $table->integer('duration')->comment('in days');
            $table->string('attachment');
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->foreignId('assign_to')->nullable();
            $table->timestamps();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
