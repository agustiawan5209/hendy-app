<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPrefensi extends Model
{
    use HasFactory;
    protected $table = "nilai_prefensis";
    protected $fillable =['kode', 'nama'];
}
