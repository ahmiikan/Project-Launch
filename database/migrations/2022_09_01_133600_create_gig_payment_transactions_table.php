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
        Schema::create('gig_payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_UID')->unique();
            $table->string('card_name');
            $table->string('card_number');
            $table->string('card_cvc');
            $table->string('card_exp_month');
            $table->string('card_exp_year');
            $table->foreignId('gig_id');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('gig_payment_transactions');
    }
};
