<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsInDetailPenggemukanTable extends Migration
{
    public function up(): void
    {
        Schema::table('detail_penggemukan', function (Blueprint $table) {
            $table->bigInteger('harga_itik_dijual')->unsigned()->change();
            $table->bigInteger('total_revenue')->unsigned()->change();
            $table->bigInteger('standard_pakan')->unsigned()->change();
            $table->bigInteger('harga_pakan')->unsigned()->change();
            $table->bigInteger('biaya_pakan')->unsigned()->change();
            $table->bigInteger('biaya_tk')->unsigned()->change();
            $table->bigInteger('biaya_listrik')->unsigned()->change();
            $table->bigInteger('biaya_ovk')->unsigned()->change();
            $table->bigInteger('total_biaya_operasional')->unsigned()->change();
            $table->bigInteger('total_variable_cost')->unsigned()->change();
            $table->bigInteger('sewa_kandang')->unsigned()->change();
            $table->bigInteger('penyusutan_itik')->unsigned()->change();
            $table->bigInteger('total_fixed_cost')->unsigned()->change();
            $table->bigInteger('total_cost')->unsigned()->change();
            $table->bigInteger('laba')->unsigned()->change();
            $table->bigInteger('mos')->unsigned()->change();
            $table->bigInteger('r/c_ratio')->unsigned()->change();
            $table->bigInteger('bep_harga')->unsigned()->change();
            $table->bigInteger('bep_hasil')->unsigned()->change();
        });
    }

    public function down(): void
    {
        Schema::table('detail_penggemukan', function (Blueprint $table) {
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
