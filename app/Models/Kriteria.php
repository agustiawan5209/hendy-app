<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriterias';
    protected $fillable =['kode','name'];

    public function kriteria1(){
        return $this->hasOne(NilaiBobotKriteria::class, 'kriteria1', 'id');
    }
    public function kriteria2(){
        return $this->hasOne(NilaiBobotKriteria::class, 'kriteria1', 'id');
    }
}
