<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PPA4 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppa4';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppa4User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppa4User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
