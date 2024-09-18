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
        Schema::create('new_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_refrence')->unique();
            $table->string('order_title')->nullable();
            $table->string('min_asked_price')->default(0);
            $table->string('max_asked_price')->default(0);
            $table->string('asked_dayes')->default(1);
            $table->text('description');
            $table->text('attachment')->null();
            $table->string('offers_numbers');
            $table->string('offer_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('companies_type_id');
            $table->foreign('companies_type_id')->references('id')->on('companies_types')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_requests');
    }
};
