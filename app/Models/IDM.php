<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IDM extends Model
{
    use HasFactory;
    protected $table = 'tabel_idm';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['idmUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function idmUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
