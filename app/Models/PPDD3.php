<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPDD3 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppdd3';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppdd3User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppdd3User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
