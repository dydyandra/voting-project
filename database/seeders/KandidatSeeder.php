<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kandidat;

class KandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kandidat::create([
            'nama' => 'Barack Obama',
            'keterangan' => 'Barack Hussein Obama II (lahir 4 Agustus 1961) adalah seorang politikus Amerika yang menjabat sebagai Presiden Amerika Serikat ke-44.',
            'slug' => 'barackobama',
            'photo' => 'barack.jpg'
        ]);

        Kandidat::create([
            'nama' => 'Joe Biden',
            'keterangan' => 'Joseph Robinette Biden Jr. (lahir 20 November 1942) adalah seorang politikus Amerika yang menjabat sebagai Presiden Amerika Serikat ke-46.',
            'slug' => 'joebiden',
            'photo' => 'biden.jpeg'
        ]);

        // Kandidat::create([
        //     'nama' => 'Ichlas',
        //     'keterangan' => 'Kandidat Nomor 3',
        //     'slug' => 'slug',
        //     'photo' => 'noimage.jpg'
        // ]);
    }
}
