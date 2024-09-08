<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPenetasan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detail_penetasan';
    protected $primaryKey = 'id_detail_penetasan';
    protected $guarded = [];

    public function penetasan()
    {
        return $this->belongsTo(Penetasan::class, 'id_penetasan');
    }
}
