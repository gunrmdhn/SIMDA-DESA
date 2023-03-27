<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyaluranSiltapTunjangan extends Model
{
    use HasFactory;
    protected $table = 'tabel_penyaluran_siltap_tunjangan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['penyaluransiltaptunjanganUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function penyaluransiltaptunjanganUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
