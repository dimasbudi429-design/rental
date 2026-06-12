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
       Schema::create('playstations', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->enum('type', ['PS4','PS5']);
    $table->enum('status', ['tersedia','digunakan','maintenance'])->default('tersedia');
    $table->integer('price_per_hour');
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
        Schema::dropIfExists('playstations');
    }
};
