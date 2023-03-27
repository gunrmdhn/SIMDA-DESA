<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'tabel_berita';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }
}
