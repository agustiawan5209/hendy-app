<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMatrix extends Model
{
    use HasFactory;
    protected $table = 'nilai_matrices';
    protected $fillable = ['kode', 'data', 'ranking','nama', 'kecamatan'];

    public function alternatif(){
        return $this->hasOne(Alternatif::class, 'kode','kode');
    }
}
