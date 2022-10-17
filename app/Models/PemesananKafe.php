<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananKafe extends Model
{
    use HasFactory;
    protected $table = 'pemesanankafe';
    protected $primaryKey = 'id_pemesanankafe';
}
