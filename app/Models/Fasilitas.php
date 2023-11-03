<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    public $timestamp = false;

    public $fillable=[
        'fasilitas',
        'foto_fasilitas',
        'deskripsi_fasilitas'
    ];    
}
