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
            $table->decimal('harga_dod', 10, 2);
            $table->decimal('total_revenue', 10, 2);
            $table->decimal('biaya_pembelian', 10, 2);
            $table->decimal('harga_telur', 10, 2);
            $table->decimal('biaya_tk', 10, 2);
            $table->decimal('biaya_listrik', 10, 2);
            $table->decimal('biaya_ovk', 10, 2);
            $table->decimal('total_biaya_operasional', 10, 2);
            $table->decimal('total_variable_cost', 10, 2);
            $table->decimal('sewa_kandang', 10, 2);
            $table->decimal('penyusutan_peralatan', 10, 2);
            $table->decimal('total_fixed_cost', 10, 2);
            $table->decimal('total_cost', 10, 2);
            $table->decimal('laba', 10, 2);
            $table->integer('mos');
            $table->integer('r/c_ratio');
            $table->integer('bep_harga');
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