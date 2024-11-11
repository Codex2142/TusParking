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
        Schema::create('eksternal', function (Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('identitas')->nullable();
            $table->string('keperluan');
            $table->string('linkfoto');
            $table->timestamp('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eksternal');
    }
};
