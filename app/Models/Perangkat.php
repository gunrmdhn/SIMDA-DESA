<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    use HasFactory;
    protected $table = 'tabel_perangkat';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['perangkatUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function perangkatUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
