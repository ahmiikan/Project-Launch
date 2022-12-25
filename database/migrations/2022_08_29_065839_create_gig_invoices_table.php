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
        Schema::create('gig_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gig_purchase_id');
            $table->double('gig_amount');

            $table->date('expiry_date')->nullable();
            $table->smallInteger('payment_status')->nullable()->comment('0:not paid, 1:paid');
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
        Schema::dropIfExists('gig_invoices');
    }
};
