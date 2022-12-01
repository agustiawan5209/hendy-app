<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAlternatif extends Model
{
    use HasFactory;
    protected $table = 'sub_alternatifs';
    protected $fillable = [
        'alternatif_id',
        'sub_kriteria',
        'kriteria_kode'
    ];
    public function kriteria(){
        return $this->hasOne(Kriteria::class, 'kode' ,'kriteria_kode');
    }
}
