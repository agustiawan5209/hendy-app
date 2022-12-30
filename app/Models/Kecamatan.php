<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatans';
    protected $fillable = ['nama'];
    public function alternatif(){
        return $this->hasOne(Alternatif::class, 'kecamatan_id', 'id');
    }
}
