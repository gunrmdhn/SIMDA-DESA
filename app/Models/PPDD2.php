<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPDD2 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppdd2';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppdd2User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppdd2User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
