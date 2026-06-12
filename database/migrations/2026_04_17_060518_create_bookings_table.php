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
      Schema::create('bookings', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('playstation_id')->constrained()->onDelete('cascade');

    $table->dateTime('start_time');
    $table->dateTime('end_time');
    $table->integer('duration');

    $table->enum('status', ['pending','confirmed','ongoing','finished','cancelled'])->default('pending');

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
        Schema::dropIfExists('bookings');
    }
};
