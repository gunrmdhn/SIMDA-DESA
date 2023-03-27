<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BUMDes extends Model
{
    use HasFactory;
    protected $table = 'tabel_bumdes';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['bumdesUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function bumdesUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
