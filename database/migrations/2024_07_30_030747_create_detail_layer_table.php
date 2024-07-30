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
        Schema::create('detail_layer', function (Blueprint $table) {
            $table->id('id_detail_layer');
            $table->unsignedBigInteger('id_layer');
            $table->foreign('id_layer')->references('id_layer')->on('layer')->onUpdate('cascade')->onDelete('cascade');
            $table->string('periode');
            $table->integer('jumlah_itik');
            $table->integer('presentase_bertelur');
            $table->decimal('harga_jual_telur', 10, 2);
            $table->decimal('total_revenue', 10, 2);
            $table->decimal('standard_pakan', 10, 2);
            $table->integer('jumlah_hari');
            $table->integer('jumlah_pakan');
            $table->decimal('harga_pakan', 10, 2);
            $table->decimal('biaya_pakan', 10, 2);
            $table->decimal('biaya_tk', 10, 2);
            $table->decimal('biaya_listrik', 10, 2);
            $table->decimal('biaya_lampu', 10, 2);
            $table->decimal('biaya_ovk', 10, 2);
            $table->decimal('total_biaya_operasional', 10, 2);
            $table->decimal('total_variable_cost', 10, 2);
            $table->decimal('biaya_penyesutan_itik', 10, 2);
            $table->decimal('sewa_kandang', 10, 2);
            $table->decimal('penyusutan_peralatan', 10, 2);
            $table->decimal('total_fixed_cost', 10, 2);
            $table->decimal('total_cost', 10, 2);
            $table->decimal('laba', 10, 2);
            $table->integer('mos');
            $table->integer('r/c_ratio');
            $table->integer('bep_harga');
            $table->integer('bep_hasil');
            $table->integer('total_telur');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_layer');
    }
};
