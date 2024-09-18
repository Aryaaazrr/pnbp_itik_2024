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
        Schema::create('analisis', function (Blueprint $table) {
            $table->id('id_analisis');
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id_users')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_tipe_analisis');
            $table->foreign('id_tipe_analisis')->references('id_tipe_analisis')->on('tipe_analisis')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis');
    }
};