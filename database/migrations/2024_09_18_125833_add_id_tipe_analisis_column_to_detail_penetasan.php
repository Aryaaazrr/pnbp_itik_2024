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
        Schema::table('detail_penetasan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_analisis');
            $table->foreign('id_analisis')->references('id_analisis')->on('analisis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_penetasan', function (Blueprint $table) {
            $table->dropForeign('detail_penetasan_id_analisis');
            $table->dropColumn('id_analisis');
        });
    }
};
