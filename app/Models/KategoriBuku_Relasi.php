<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku_Relasi extends Model
{
    use HasFactory;

    protected $table = "kategoribuku_relasi";
    protected $guarded = ['id'];

    // RELASI ANTAR TABLE
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function kategoribuku()
    {
        return $this->belongsTo(KategoriBuku::class);
    }

}
