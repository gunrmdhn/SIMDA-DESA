<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPBLT1 extends Model
{
    use HasFactory;
    protected $table = 'tabel_ppblt1';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['ppblt1User'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ppblt1User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
