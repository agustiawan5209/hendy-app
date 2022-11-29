<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasis';
    protected $fillable = ['alternatif_id','gambar', 'nama', 'lokasi', 'deskripsi', 'pemilik'];

    public function alternatif(){
        return $this->hasOne(Alternatif::class,'id','alternatif_id');
    }
}
