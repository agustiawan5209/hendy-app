<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = "alternatifs";
    protected $fillable =['kode', 'nama'];

    public function lokasi(){
        return $this->hasOne(Lokasi::class, 'alternatif_id','id');
    }
}
