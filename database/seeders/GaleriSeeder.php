<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Galeri::insert([
            [
                'judul' => 'Kunjungan 1',
                'gambar' => 'galeri1.jpeg'
            ],
            [
                'judul' => 'Kunjungan 2',
                'gambar' => 'galeri2.jpeg'
            ],
            [
                'judul' => 'Kunjungan 3',
                'gambar' => 'galeri3.jpeg'
            ],
            [
                'judul' => 'Kunjungan 4',
                'gambar' => 'galeri4.jpeg'
            ],
            [
                'judul' => 'Kunjungan 5',
                'gambar' => 'galeri5.jpeg'
            ],
            [
                'judul' => 'Kunjungan 6',
                'gambar' => 'galeri6.jpeg'
            ]
        ]);
    }
}
