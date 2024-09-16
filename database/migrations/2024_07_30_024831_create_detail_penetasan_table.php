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
        Schema::create('detail_penetasan', function (Blueprint $table) {
            $table->id('id_detail_penetasan');
            $table->unsignedBigInteger('id_penetasan');
            $table->foreign('id_penetasan')->references('id_penetasan')->on('penetasan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('periode');
            $table->integer('jumlah_telur');
            $table->integer('presentase_menetas');
            $table->integer('jumlah_dod');
            $table->decimal('harga_dod', 20, 2);
            $table->decimal('total_revenue', 20, 2);
            $table->decimal('harga_telur', 20, 2);
            $table->decimal('total_biaya_pembelian_telur', 20, 2);
            $table->decimal('biaya_tk', 20, 2);
            $table->decimal('biaya_listrik', 20, 2);
            $table->decimal('biaya_ovk', 20, 2);
            $table->decimal('biaya_operasional', 20, 2);
            $table->integer('jumlah_hari');
            $table->decimal('total_biaya_operasional', 20, 2);
            $table->decimal('total_variable_cost', 20, 2);
            $table->decimal('sewa_kandang', 20, 2);
            $table->decimal('penyusutan_peralatan', 20, 2);
            $table->decimal('total_biaya', 20, 2);
            $table->decimal('total_fixed_cost', 20, 2);
            $table->decimal('total_cost', 20, 2);
            $table->decimal('laba', 20, 2);
            $table->decimal('mos', 20, 2);
            $table->integer('r/c_ratio');
            $table->decimal('bep_harga', 20, 2);
            $table->integer('bep_hasil');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penetasan');
    }
};