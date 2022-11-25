<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevaisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:makeUserRevaisor {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'rendi utente revaisor';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if(!$user){
            $this->error('Utente non trovato');
            return;
        };

        $user->is_revaisor = true;
        $user->save();
        $this->info("L\'utente {$user->name} è ora un revaisor");
    }
}
