<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagu extends Model
{
    use HasFactory;
    protected $table = 'tabel_pagu';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['paguUser'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function paguUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
