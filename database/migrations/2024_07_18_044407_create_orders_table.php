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
            $table->integer('customer_id')->nullable();
            $table->text('voucher_no')->nullable();
            $table->double('total_amount')->default(0);
            $table->enum('status',['Pending','Shipped','Delivered','Cancelled'])->default('Pending');
            $table->enum('payment_status',['Paid','Unpaid'])->default ('Unpaid');
            $table->text('payment_screenshot')->nullable();
            $table->timestamps();
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