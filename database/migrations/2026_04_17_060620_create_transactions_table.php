<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
    $table->id();

    $table->foreignId('booking_id')->constrained()->onDelete('cascade');

    $table->integer('total_price');
    $table->enum('payment_method', ['cash','transfer']);
    $table->enum('payment_status', ['unpaid','waiting_verification','paid'])->default('unpaid');

    $table->string('proof_of_payment')->nullable();

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
        Schema::dropIfExists('transactions');
    }
};
