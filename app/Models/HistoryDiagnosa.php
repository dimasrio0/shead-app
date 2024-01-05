<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryDiagnosa extends Model
{
    protected $table = 'history_diagnosa';
    protected $fillable = ['id_penyakit', 'id_user', 'tanggal_diagnosa'];
    

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit');
    }
}

