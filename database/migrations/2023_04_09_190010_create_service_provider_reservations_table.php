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
        Schema::create('service_provider_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('disc');
            $table->unsignedBigInteger('type_work');
            $table->foreign('type_work')->references('id')->on('companies_types')->onDelete('cascade');
            $table->string('attach');
            $table->string('status');
            $table->string('approve')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provider_reservations');
    }
};
