<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $guarded = ['id'];

    // RELASI ANTAR TABLE
    public function ulasanbuku()
    {
        return $this->hasMany(UlasanBuku::class);
    }
    public function koleksipribadi()
    {
        return $this->hasMany(KolekasiPribadi::class);
    }
    public function kategoribuku_relasi()
    {
        return $this->hasMany(KategoriBuku_Relasi::class);
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
