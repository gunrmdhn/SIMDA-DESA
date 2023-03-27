<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    use HasFactory;
    protected $table = 'tabel_stunting';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['stuntingUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function stuntingUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
