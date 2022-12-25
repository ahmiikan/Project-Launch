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
        Schema::table('gigs', function (Blueprint $table) {
            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('gig_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->dropForeign(['freelancer_id']);
            $table->dropForeign(['category_id']);

        });
    }
};
