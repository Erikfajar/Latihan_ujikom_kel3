<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KolekasiPribadi extends Model
{
    use HasFactory;
    protected $table = "kolekasi_pribadi";
    protected $guarded = ['id'];

    // RELASI ANTAR TABLE
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
