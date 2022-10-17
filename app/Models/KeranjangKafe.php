<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangKafe extends Model
{
    use HasFactory;
    protected $table = 'keranjangkafe';
    protected $primaryKey = 'id_keranjangkafe';
}
