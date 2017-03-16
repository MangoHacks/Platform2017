<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class InsertSponsorUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mango:sponsor-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a sponsor user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = new User();
        $user->name = 'Sponsor';
        $user->email = env('SPONSOR_EMAIL');
        $user->password = bcrypt(env('SPONSOR_PASSWORD'));
        $user->save();
    }
}
