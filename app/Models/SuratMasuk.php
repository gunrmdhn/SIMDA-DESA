<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'tabel_surat_masuk';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }
}
