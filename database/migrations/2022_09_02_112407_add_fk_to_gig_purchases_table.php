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
        Schema::table('gig_purchases', function (Blueprint $table) {
            $table->foreign('gig_transaction_id')->references('id')->on('gig_payment_transactions')->onDelete('cascade');
            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gig_purchases', function (Blueprint $table) {
            $table->dropForeign(['gig_transaction_id']);
            $table->dropForeign(['freelancer_id']);

        });
    }
};
