<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('delivery_method');
            $table->string('payment_method');
            $table->string('address');
            $table->string('country');
            $table->string('name');
            $table->string('surname');
            $table->string('postal_index');
            $table->uuid('customer_order_id')->unique();
            $table->string('city');
            $table->string('phone');
            $table->float('summary');
            $table->boolean('newsletter_subscribe');
            $table->string('comment')->nullable();
            $table->string('additional_address')->nullable();
            $table->string('additional_postal_code')->nullable();
            $table->string('additional_city')->nullable();
            $table->string('additional_country')->nullable();
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
