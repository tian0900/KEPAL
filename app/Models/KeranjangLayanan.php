<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangLayanan extends Model
{
    use HasFactory;
    protected $table = 'keranjanglayanan';
    protected $primaryKey = 'id_keranjanglayanan';
}
