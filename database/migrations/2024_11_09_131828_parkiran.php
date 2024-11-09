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
        Schema::create('parkiran', function (Blueprint $table){
            $table->id();
            $table->string('plat');
            $table->bigInteger('nipmasuk');
            $table->string('nimmasuk');
            $table->timestamp('masuk');
            $table->timestamp('keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
