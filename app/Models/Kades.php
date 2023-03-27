<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kades extends Model
{
    use HasFactory;
    protected $table = 'tabel_kades';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['kadesUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function kadesUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
