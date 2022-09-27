<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = "layanan";

    protected $fillable = [
        'layanan',
        'deskripsi',
        'status',
        'icon'
    ];

    
    public function fields()
    {
        return $this->hasMany('App\Models\LayananField', 'layanan_id', 'id');
    }

}
