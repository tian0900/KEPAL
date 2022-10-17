<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SosialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\sosial_media::insert([
            [
                'judul' => 'Instagram',
                'hyperlink' =>  '/',
            ],
            [
                'judul' => 'Twitter',
                'hyperlink' =>  '/',
            ],
            [
                'judul' => 'Youtube',
                'hyperlink' =>  '/',
            ],
            [
                'judul' => 'Facebook',
                'hyperlink' =>  '/',
            ]
        ]);
    }
}
