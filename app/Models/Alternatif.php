<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = "alternatifs";
    protected $fillable =['kode', 'nama', 'kecamatan_id'];

    public function lokasi(){
        return $this->hasOne(Lokasi::class, 'alternatif_id','id');
    }
    public function subalternatif(){
        return $this->hasMany(SubAlternatif::class, 'alternatif_id','id');
    }
    public function nilaiMatrix(){
        return $this->hasOne(NilaiMatrix::class, 'kode','kode');
    }
    public function kecamatan(){
        return $this->hasOne(Kecamatan::class, 'kecamatan_id','nama');
    }
}
