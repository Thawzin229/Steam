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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('cpu')->nullable()->default("i3");
            $table->string('os')->nullable()->default("window");
            $table->string('ram')->nullable()->default("4GB");
            $table->string('status')->nullable()->default("active");
            $table->string('directx')->nullable()->default("Version 9.0c");
            $table->string('storage')->nullable()->default("15 GB available space");
            $table->string('gpu')->nullable()->default("Must be above or blow GTX-1650Ti Super");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
