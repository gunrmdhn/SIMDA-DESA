<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiDPMPD extends Model
{
    use HasFactory;
    protected $table = 'tabel_pegawai_dpmpd';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }
}
