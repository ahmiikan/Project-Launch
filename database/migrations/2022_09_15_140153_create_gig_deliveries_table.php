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
        Schema::create('gig_deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->text('instructions')->nullable();
            $table->foreignId('gig_purchase_id');
            $table->string('delivery_UID')->unique();
            $table->text('reason_for_rejection')->nullable();
            $table->smallInteger('status')->default(0)->comment('0: pending, 1: completed, 2: rejected');
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
        Schema::dropIfExists('gig_deliveries');
    }
};
