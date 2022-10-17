<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananProduk extends Model
{
    use HasFactory;
    protected $table = 'pemesananproduk';
    protected $primaryKey = 'id_pemesananproduk';
    protected $dates = ['tanggal_pemesanan'];
}
