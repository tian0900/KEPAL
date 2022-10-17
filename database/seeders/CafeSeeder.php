<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Cafe::insert([
            [
                'nama' => 'Nasi Goreng Ayam',
                'harga_cafe' => 18000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Nasi Goreng Biasa',
                'harga_cafe' => 15000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Bihun Goreng',
                'harga_cafe' => 15000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Ifumie Goreng',
                'harga_cafe' => 15000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Indomie Goreng Hype Abis' ,
                'harga_cafe' => 15000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Indomie Goreng Ayam Geprek' ,
                'harga_cafe' => 15000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Indomie Goreng Ayam Sambal Matah' ,
                'harga_cafe' => 15000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Indomie Soto Medan' ,
                'harga_cafe' => 12000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Indomie Soto Seblak' ,
                'harga_cafe' => 12000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Indomie Soto Lamongan' ,
                'harga_cafe' => 12000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Dimsum Ayam/Udang' ,
                'harga_cafe' => 20000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Chicken Pop' ,
                'harga_cafe' => 12000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'French Fires' ,
                'harga_cafe' => 12000,
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Pisang Krispy Cokelat Keju' ,
                'harga_cafe' => 12000,
                'kategori' => 'Makanan'
            ],          
            [
                'nama' => 'Kopi Koktong' ,
                'harga_cafe' => 6000,
                'kategori' => 'Minuman'
            ],
            [
                'nama' => 'White Coffee' ,
                'harga_cafe' => 6000,
                'kategori' => 'Minuman'
            ],
            [
                'nama' => 'Capucino' ,
                'harga_cafe' => 6000,
                'kategori' => 'Minuman'
            ],
            [
                'nama' => 'Coffeemix' ,
                'harga_cafe' => 6000,
                'kategori' => 'Minuman'
            ],
            [
                'nama' => 'Tora Bika' ,
                'harga_cafe' => 6000,
                'kategori' => 'Minuman'
            ],
            [
                'nama' => 'Kopi Ginseng' ,
                'harga_cafe' => 8000,
                'kategori' => 'Minuman'
            ],
            [
                'nama' => 'Jus Alpukat' ,
                'harga_cafe' => 12000,
                'kategori' => 'Jus'
            ],
            [
                'nama' => 'Jus Nenas' ,
                'harga_cafe' => 12000,
                'kategori' => 'Jus'
            ],
            [
                'nama' => 'Jus Wortel' ,
                'harga_cafe' => 12000,
                'kategori' => 'Jus'
            ],
            [
                'nama' => 'Jus Nenas Sawi' ,
                'harga_cafe' => 12000,
                'kategori' => 'Jus'
            ],
            [
                'nama' => 'Air Jeruk' ,
                'harga_cafe' => 12000,
                'kategori' => 'Jus'
            ]
        ]);
    }
}
