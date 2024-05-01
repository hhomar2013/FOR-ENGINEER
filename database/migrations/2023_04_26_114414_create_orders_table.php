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
            $table->uuid('order_ref')->unique();
            $table->longText('details');
            $table->string('price');
            $table->string('transaction_id');
            $table->string('status');
            $table->unsignedBigInteger('company_service');
            $table->foreign('company_service')->references('id')->on('companies_services')->onDelete('cascade');
            $table->string('user');
            $table->softDeletes();
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
