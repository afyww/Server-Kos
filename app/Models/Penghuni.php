<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'identitas',
        'kamar_id',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }


}
