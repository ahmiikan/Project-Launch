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
        Schema::table('gig_deliveries', function (Blueprint $table) {
            $table->foreign('gig_purchase_id')->references('id')->on('gig_purchases')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gig_deliveries', function (Blueprint $table) {
            $table->dropForeign(['gig_purchase_id']);
        });
    }
};
