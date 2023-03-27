<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;
    protected $table = 'tabel_rt';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['rtUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function rtUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
