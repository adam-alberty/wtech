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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedInteger('delivery_type_id');
            $table->unsignedInteger('payment_type_id');
            $table->decimal('price');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('country');
            $table->string('city');
            $table->string('street_address');
            $table->string('zip_code');
            $table->enum('status', ['placed', 'sent', 'delivered', 'returned'])->default('placed');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('delivery_type_id')->references('id')->on('delivery_types')
                ->onDelete('cascade');
            $table->foreign('payment_type_id')->references('id')->on('payment_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
