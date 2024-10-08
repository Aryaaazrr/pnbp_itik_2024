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

    protected $guarded = [];

    public function tipe_analisis()
    {
        return $this->belongsTo(TipeAnalisis::class, 'id_tipe_analisis');
    }
}
