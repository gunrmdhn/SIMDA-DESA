<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'nama_pengguna';
    }

    public function userKades()
    {
        return $this->hasMany(Kades::class);
    }

    public function userPerangkat()
    {
        return $this->hasMany(Perangkat::class);
    }

    public function userPagu()
    {
        return $this->hasMany(Pagu::class);
    }

    public function userAPBDes()
    {
        return $this->hasMany(APBDes::class);
    }

    public function userRealisasiAPBDes()
    {
        return $this->hasMany(RealisasiAPBDes::class);
    }

    public function userPenyaluranSiltapTunjangan()
    {
        return $this->hasMany(PenyaluranSiltapTunjangan::class);
    }

    public function userPenyaluranOperasionalTriwulan()
    {
        return $this->hasMany(PenyaluranOperasionalTriwulan::class);
    }

    public function userPPA2()
    {
        return $this->hasMany(PPA2::class);
    }

    public function userPPA3()
    {
        return $this->hasMany(PPA3::class);
    }

    public function userPPA4()
    {
        return $this->hasMany(PPA4::class);
    }

    public function userPPDD1()
    {
        return $this->hasMany(PPDD1::class);
    }

    public function userPPDD2()
    {
        return $this->hasMany(PPDD2::class);
    }

    public function userPPDD3()
    {
        return $this->hasMany(PPDD3::class);
    }

    public function userPPBLT1()
    {
        return $this->hasMany(PPBLT1::class);
    }

    public function userPPBLT2()
    {
        return $this->hasMany(PPBLT2::class);
    }

    public function userPPBLT3()
    {
        return $this->hasMany(PPBLT3::class);
    }

    public function userPPBLT4()
    {
        return $this->hasMany(PPBLT4::class);
    }

    public function userRT()
    {
        return $this->hasMany(RT::class);
    }

    public function userIDM()
    {
        return $this->hasMany(IDM::class);
    }

    public function userBUMDes()
    {
        return $this->hasMany(BUMDes::class);
    }

    public function userStunting()
    {
        return $this->hasMany(Stunting::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
