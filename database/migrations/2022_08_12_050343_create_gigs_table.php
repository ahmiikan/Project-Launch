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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('freelancer_id');
            $table->string('title');
            $table->text('description');
            $table->foreignId('category_id');
            $table->integer('amount');
            $table->double('gig_commission');
            $table->double('gig_amount_after_commission');
            $table->integer('duration');
            $table->string('image');
            $table->smallInteger('status')->default(0)->comment('0 = Pending, 1 = Approved, 2 = Canceled');
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
        Schema::dropIfExists('gigs');
    }
};
