<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Analisis extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'analisis';
    protected $primaryKey = 'id_analisis';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function tipe_analisis()
    {
        return $this->belongsTo(TipeAnalisis::class, 'id_tipe_analisis');
    }
}
