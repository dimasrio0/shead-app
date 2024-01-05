<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';
    protected $fillable = ['nama_penyakit', 'keterangan', 'solusi'];

    public function gejala()
    {
        return $this->hasMany(Gejala::class, 'id_penyakit');
    }

    public function historyDiagnosa()
    {
        return $this->hasMany(HistoryDiagnosa::class, 'id_penyakit');
    }
}
