<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPBLT3 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppblt3';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppblt3User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppblt3User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
