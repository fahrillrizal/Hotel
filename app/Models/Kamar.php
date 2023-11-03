<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    public $timestamp = false;

    public $fillable=[
        'type_kamar',
        'fasilitas',
        'foto_kamar',
        'jumlah_kamar',
        'harga',
        'deskripsi_kamar'
    ];

    public function pesan(){
        return $this->hasMany(Pesan::class);
    }
}
