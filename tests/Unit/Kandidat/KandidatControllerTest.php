<?php

namespace Tests\Unit\Kandidat;
use App\Models\Kandidat;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KandidatControllerTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->withoutExceptionHandling();

        $kandidat = Kandidat::create(["nama" => "Afif","keterangan" => "Ini buat coba-coba", "slug" => "afif",  "photo" => "noimage.jpg"]);
        $this->assertDatabaseHas('kandidats', [
                 'nama' => 'Afif','keterangan' => "Ini buat coba-coba", "slug" => "afif", 'photo' => "noimage.jpg"
              ]);

        Kandidat::find($kandidat->id)->update(['nama' => 'Andra','keterangan' => "Kandidat Nomor 1", "slug" => "andra", 'photo' => "noimage.jpg"]);
        $this->assertDatabaseHas('kandidats', [
             'nama' => 'Andra','keterangan' => "Kandidat Nomor 1", "slug" => "andra", 'photo' => "noimage.jpg"
              ]);

        Kandidat::destroy($kandidat->id);
        $this->assertDatabaseMissing('kandidats', [
             'nama' => 'Andra','keterangan' => "Kandidat Nomor 1", "slug" => "andra", 'photo' => "noimage.jpg"
              ]);

        
    }

    
}
