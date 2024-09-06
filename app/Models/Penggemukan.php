<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penggemukan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penggemukan';
    protected $primaryKey = 'id_penggemukan';
    protected $fillable = [
        'id_users',
        'image_diagram',
    ];
    public function details()
    {
        return $this->hasMany(DetailPenggemukan::class, 'id_penggemukan');
    }
}
