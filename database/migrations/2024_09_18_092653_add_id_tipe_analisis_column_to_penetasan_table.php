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
        Schema::table('penetasan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tipe_analisis');
            $table->foreign('id_tipe_analisis')->references('id_tipe_analisis')->on('tipe_analisis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penetasan', function (Blueprint $table) {
            $table->dropForeign('penetasan_id_tipe_analisis');
            $table->dropColumn('id_tipe_analisis');
        });
    }
};
