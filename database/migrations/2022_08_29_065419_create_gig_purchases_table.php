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
        Schema::create('gig_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('order_UID');
            $table->foreignId('gig_id');
            $table->foreignId('user_id');
            $table->foreignId('freelancer_id');
            $table->foreignId('gig_transaction_id');
            // $table->string('payment_id');
            $table->smallInteger('purchase_status')->default('0')->comment('0 = Pending Purchase , 1 = In Progress , 2 = Delivered, 3 = Completed');
            $table->double('gig_total_amount'); 
            $table->text('gig_requirements');
            $table->string('attachment')->nullable()->comment('Attachment of the gig requirements');
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
        Schema::dropIfExists('gig_purchases');
    }
};
