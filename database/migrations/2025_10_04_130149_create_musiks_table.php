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
        Schema::create('musiks', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('judul');
            $table->string('cover');
            $table->string('link_direct');
            $table->string('ciptaan');
            $table->string('link_spotify');
            $table->string('link_itunes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musiks');
    }
};
