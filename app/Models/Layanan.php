<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;    
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';

    public function scopeFilter($query, array $filters){
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('jenisservice', 'like', '%' . $filters['search'] . '%')
                ->orWhere('harga_tipea', 'like', '%' .  $filters['search'] . '%')
                ->orWhere('harga_tipeb', 'like', '%' .  $filters['search'] . '%');
        }
    }
}
