<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangProduk extends Model
{
    use HasFactory;
    protected $table = 'keranjangproduk';
    protected $primaryKey = 'id_keranjangproduk';

}
