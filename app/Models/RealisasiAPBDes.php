<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiAPBDes extends Model
{
    use HasFactory;
    protected $table = 'tabel_realisasi_apbdes';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['realisasiapbdesUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function realisasiapbdesUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
