<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    public $fillable=[
        'nama_pengguna',
        'email',
        'no_hp',
        'kamar_id',
        'nama_tamu',
        'tipe_kamar',
        'chek_in',
        'chek_out',
        'jumlah',
        'confirm',
    ];

    public $timestamps = false;

    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }
}
