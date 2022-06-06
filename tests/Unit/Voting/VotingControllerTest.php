<?php

namespace Tests\Unit\Voting;

use App\Models\Voting;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VotingControllerTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_voting()
    {
        $this->withoutExceptionHandling();

        $voting = Voting::create(["user_id" => 2,"kandidat_id" => 2]);
        $this->assertDatabaseHas('voting', [
            "user_id" => 2,"kandidat_id" => 2
            ]);

        Voting::find($voting->id)->update(["user_id" => 3,"kandidat_id" => 4]);
        $this->assertDatabaseHas('voting', [
            "user_id" => 3,"kandidat_id" => 4
              ]);

        Voting::destroy($voting->id);
        $this->assertDatabaseMissing('voting', [
            "user_id" => 3,"kandidat_id" => 4
              ]);

    }
}
