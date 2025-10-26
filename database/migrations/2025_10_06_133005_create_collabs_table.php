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
        Schema::create('collabs', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('banner');
            $table->string('judul');
            $table->string('tahun');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collabs');
    }
};
