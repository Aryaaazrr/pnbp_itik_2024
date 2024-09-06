<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumns2InDetailPenggemukanTable extends Migration
{
    public function up(): void
    {
        Schema::table('detail_penggemukan', function (Blueprint $table) {
            // Ubah kolom yang ingin menggunakan BIGINT
            $table->unsignedBigInteger('harga_itik_dijual')->change();
            $table->unsignedBigInteger('total_revenue')->change();
            $table->unsignedBigInteger('standard_pakan')->change();
            $table->unsignedBigInteger('harga_pakan')->change();
            $table->unsignedBigInteger('biaya_pakan')->change();
            $table->unsignedBigInteger('biaya_tk')->change();
            $table->unsignedBigInteger('biaya_listrik')->change();
            $table->unsignedBigInteger('biaya_ovk')->change();
            $table->unsignedBigInteger('total_biaya_operasional')->change();
            $table->unsignedBigInteger('total_variable_cost')->change();
            $table->unsignedBigInteger('sewa_kandang')->change();
            $table->unsignedBigInteger('penyusutan_itik')->change();
            $table->unsignedBigInteger('total_fixed_cost')->change();
            $table->unsignedBigInteger('total_cost')->change();
            $table->unsignedBigInteger('laba')->change();
            $table->unsignedBigInteger('mos')->change();
            $table->unsignedBigInteger('r/c_ratio')->change();
            $table->unsignedBigInteger('bep_harga')->change();
            $table->unsignedBigInteger('bep_hasil')->change();
        });
    }

    public function down(): void
    {
        Schema::table('detail_penggemukan', function (Blueprint $table) {
            // Ubah kolom kembali ke tipe sebelumnya jika rollback
            $table->decimal('harga_itik_dijual', 10, 2)->change();
            $table->decimal('total_revenue', 10, 2)->change();
            $table->decimal('standard_pakan', 10, 2)->change();
            $table->decimal('harga_pakan', 10, 2)->change();
            $table->decimal('biaya_pakan', 10, 2)->change();
            $table->decimal('biaya_tk', 10, 2)->change();
            $table->decimal('biaya_listrik', 10, 2)->change();
            $table->decimal('biaya_ovk', 10, 2)->change();
            $table->decimal('total_biaya_operasional', 10, 2)->change();
            $table->decimal('total_variable_cost', 10, 2)->change();
            $table->decimal('sewa_kandang', 10, 2)->change();
            $table->decimal('penyusutan_itik', 10, 2)->change();
            $table->decimal('total_fixed_cost', 10, 2)->change();
            $table->decimal('total_cost', 10, 2)->change();
            $table->decimal('laba', 10, 2)->change();
            $table->integer('mos')->change();
            $table->integer('r/c_ratio')->change();
            $table->integer('bep_harga')->change();
            $table->integer('bep_hasil')->change();
        });
    }
}
