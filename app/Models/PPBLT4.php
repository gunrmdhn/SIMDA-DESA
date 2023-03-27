<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPBLT4 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppblt4';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppblt4User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppblt4User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
