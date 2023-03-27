<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PPA3 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppa3';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppa3User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppa3User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
