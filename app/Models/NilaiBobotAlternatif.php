<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiBobotAlternatif extends Model
{
    use HasFactory;
    protected $table = 'nilai_bobot_alternatifs';
    protected $fillable = ['kode', 'kriteria_id', 'nilai_banding', 'alternatif1', 'alternatif2'];
}
