<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPBLT2 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppblt2';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppblt2User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppblt2User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
