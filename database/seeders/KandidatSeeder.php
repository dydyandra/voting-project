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
            'nama' => 'Aflah Hilmy',
            'keterangan' => 'Kandidat Nomor 1',
            'slug' => 'aflahhilmy',
            'photo' => 'noimage.jpg'
        ]);

        Kandidat::create([
            'nama' => 'Maula',
            'keterangan' => 'Kandidat Nomor 2',
            'slug' => 'maula',
            'photo' => 'noimage.jpg'
        ]);

        Kandidat::create([
            'nama' => 'Ichlas',
            'keterangan' => 'Kandidat Nomor 3',
            'slug' => 'slug',
            'photo' => 'noimage.jpg'
        ]);
    }
}
