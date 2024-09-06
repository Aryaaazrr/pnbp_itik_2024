<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPenggemukan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detail_penggemukan';
    protected $primaryKey = 'id_detail_penggemukan';

    protected $fillable = [
        'id_penggemukan',
        'periode',
        'jumlah_itik',
        'presentase_mortalitas',
        'jumlah_itik_dijual',
        'harga_itik_dijual',
        'total_revenue',
        'standard_pakan',
        'jumlah_hari',
        'jumlah_pakan',
        'harga_pakan',
        'biaya_pakan',
        'biaya_tk',
        'biaya_listrik',
        'biaya_lampu',
        'biaya_ovk',
        'total_biaya_operasional',
        'total_variable_cost',
        'sewa_kandang',
        'penyusutan_itik',
        'total_fixed_cost',
        'total_cost',
        'laba',
        'mos',
        'r_c_ratio',
        'bep_harga',
        'bep_hasil',
    ];

    public function penggemukan()
    {
        return $this->belongsTo(Penggemukan::class, 'id_penggemukan');
    }
}
