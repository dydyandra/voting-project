<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendVotingMailable;


class VotingStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voting:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email daily for voting result';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $totalVoting = DB::table('voting')
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->count();

        Mail::to('admin@mail.com')->send(new SendVotingMailable($totalVoting));
    }
}
