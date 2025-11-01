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
        Schema::create('infos', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('image')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('email_bisnis')->nullable();
            $table->string('email_label')->nullable();
            $table->string('email_booking')->nullable();
            $table->string('nomor_booking')->nullable();
            $table->string('instagram')->nullable();
            $table->string('spotify')->nullable();
            $table->string('youtube')->nullable();
            $table->string('itunes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
