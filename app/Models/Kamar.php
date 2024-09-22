<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'harga',
        'img',
        'fasilitas',
    ];

    public function penghuni()
    {
        return $this->hasMany(Penghuni::class);
    }
}
