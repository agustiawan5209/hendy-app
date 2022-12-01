<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;
    protected $table ='sub_kriterias';
    protected $primaryKey ='id';
    protected $fillable = ['kriteria_id', 'nama'];
}
