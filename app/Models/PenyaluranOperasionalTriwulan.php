<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyaluranOperasionalTriwulan extends Model
{
    use HasFactory;
    protected $table = 'tabel_penyaluran_operasional_triwulan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['penyaluranoperasionaltriwulanUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function penyaluranoperasionaltriwulanUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
