<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiBobotKriteria extends Model
{
    use HasFactory;
    protected $table = "nilai_bobot_kriterias";
    protected $fillable =['kode','nilai_banding', 'kriteria1', 'kriteria2'];

    public function prefensi(){
        return $this->hasOne(NilaiPrefensi::class, 'id', 'nilai_banding');
    }
    public function datakriteria1(){
        return $this->hasone(Kriteria::class, 'kode' ,'kriteria1');
    }
    public function datakriteria2(){
        return $this->hasone(Kriteria::class, 'kode' ,'kriteria2');
    }
}
