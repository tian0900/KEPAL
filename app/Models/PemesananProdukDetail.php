<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananProdukDetail extends Model
{
    use HasFactory;
    protected $table = 'pemesananprodukdetail';
    protected $primaryKey = 'id_pemesananprodukdetail';

}
