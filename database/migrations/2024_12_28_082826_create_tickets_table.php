<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('mobile');
            $table->string('email');
            $table->date('booking_date');
            $table->string('booking_time');
            $table->integer('adults');
            $table->integer('children')->default(0);
            $table->integer('total_price');
            $table->string('reference_number')->unique();
            $table->string('transaction_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
