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
            'photo' => 'noimage.jpg'
        ]);

        Kandidat::create([
            'nama' => 'Maula',
            'keterangan' => 'Kandidat Nomor 2',
            'photo' => 'noimage.jpg'
        ]);

        Kandidat::create([
            'nama' => 'Ichlas',
            'keterangan' => 'Kandidat Nomor 3',
            'photo' => 'noimage.jpg'
        ]);
    }
}
