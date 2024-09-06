<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailLayer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detail_layer';
    protected $primaryKey = 'id_detail_layer';

    protected $fillable = [
        'id_layer',
        'periode',
        'jumlah_itik',
        'presentase_bertelur',
        'harga_jual_telur',
        'total_revenue',
        'standard_pakan',
        'jumlah_hari',
        'jumlah_pakan',
        'harga_pakan',
        'biaya_pakan',
        'biaya_tk',
        'biaya_listrik',
        'biaya_ovk',
        'total_biaya_operasional',
        'total_variable_cost',
        'sewa_kandang',
        'biaya_penyusutan_itik',
        'total_fixed_cost',
        'total_cost',
        'laba',
        'mos',
        'r/c_ratio',
        'bep_harga',
        'bep_hasil',
    ];

    public function layer()
    {
        return $this->belongsTo(Layer::class, 'id_layer');
    }
}
