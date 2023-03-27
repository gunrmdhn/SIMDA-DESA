<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APBDes extends Model
{
    use HasFactory;
    protected $table = 'tabel_apbdes';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['apbdesUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function apbdesUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
