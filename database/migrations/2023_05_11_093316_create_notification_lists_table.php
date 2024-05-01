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
        Schema::create('notification_lists', function (Blueprint $table) {
            $table->id();
            $table->string('message')->nullable();
            $table->string('url')->nullable();
            $table->string('to')->nullable();
            $table->string('user')->nullable();
            $table->string('icon')->nullable();
            $table->string('status')->nullable()->default(0);
            $table->string(0)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_lists');
    }
};
