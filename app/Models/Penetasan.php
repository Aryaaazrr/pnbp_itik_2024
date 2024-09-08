<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penetasan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penetasan';
    protected $primaryKey = 'id_penetasan';
    protected $guarded = [];

    public function detail_penetasan()
    {
        return $this->hasMany(DetailPenetasan::class, 'id_penetasan');
    }
}
