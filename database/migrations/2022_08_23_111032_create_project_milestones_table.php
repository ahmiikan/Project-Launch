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
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->date('due_date')->comment('in days');
            $table->double('amount');
            $table->string('attachment')->nullable();
            $table->smallInteger('status')->default(0)->comment('0 = Pending, 1 = In Progress, 2 = Delivered');
            $table->foreignId('project_id');
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
        Schema::dropIfExists('project_milestones');
    }
};
