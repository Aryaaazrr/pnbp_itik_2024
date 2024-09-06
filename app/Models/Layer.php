<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'layer';
    protected $primaryKey = 'id_layer';
    protected $fillable = [
        'id_users',
        'image_diagram',
    ];
    public function details()
    {
        return $this->hasMany(DetailLayer::class, 'id_layer');
    }
}
