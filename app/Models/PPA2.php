<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPA2 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppa2';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppa2User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppa2User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
