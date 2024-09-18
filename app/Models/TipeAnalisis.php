<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipeAnalisis extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipe_analisis';
    protected $primaryKey = 'id_tipe_analisis';
    protected $guarded = [];

    public function analisis()
    {
        return $this->hasMany(Analisis::class, 'id_tipe_analisis');
    }

    public function detail_penetasan()
    {
        return $this->hasMany(DetailPenetasan::class, 'id_tipe_analisis');
    }

    public function detail_penggemukan()
    {
        return $this->hasMany(DetailPenggemukan::class, 'id_tipe_analisis');
    }

    public function detail_layer()
    {
        return $this->hasMany(DetailLayer::class, 'id_tipe_analisis');
    }
}