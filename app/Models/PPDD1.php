<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPDD1 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppdd1';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppdd1User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppdd1User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
