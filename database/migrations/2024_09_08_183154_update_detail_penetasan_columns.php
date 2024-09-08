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
            // Mengubah tipe data kolom dari decimal ke integer
            $table->integer('harga_dod')->change();
            $table->integer('total_revenue')->change();
            $table->integer('biaya_pembelian')->change();
            $table->integer('harga_telur')->change();
            $table->integer('biaya_tk')->change();
            $table->integer('biaya_listrik')->change();
            $table->integer('biaya_ovk')->change();
            $table->integer('total_biaya_operasional')->change();
            $table->integer('total_variable_cost')->change();
            $table->integer('sewa_kandang')->change();
            $table->integer('penyusutan_peralatan')->change();
            $table->integer('total_fixed_cost')->change();
            $table->integer('total_cost')->change();
            $table->integer('laba')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_penetasan', function (Blueprint $table) {
            // Mengembalikan tipe data kolom ke decimal jika diperlukan
            $table->decimal('harga_dod', 10, 2)->change();
            $table->decimal('total_revenue', 10, 2)->change();
            $table->decimal('biaya_pembelian', 10, 2)->change();
            $table->decimal('harga_telur', 10, 2)->change();
            $table->decimal('biaya_tk', 10, 2)->change();
            $table->decimal('biaya_listrik', 10, 2)->change();
            $table->decimal('biaya_ovk', 10, 2)->change();
            $table->decimal('total_biaya_operasional', 10, 2)->change();
            $table->decimal('total_variable_cost', 10, 2)->change();
            $table->decimal('sewa_kandang', 10, 2)->change();
            $table->decimal('penyusutan_peralatan', 10, 2)->change();
            $table->decimal('total_fixed_cost', 10, 2)->change();
            $table->decimal('total_cost', 10, 2)->change();
            $table->decimal('laba', 10, 2)->change();
        });
    }
};
