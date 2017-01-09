<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\{User};

use Hash;

class AddUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new user to the system.';

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
        
        $username = $this->ask('What is your username?');
        $password = $this->secret('What is the password?');

        $user = User::create([
            'username' => $username,
            'password' => Hash::make($password)
        ]);

        $this->info('User '. $username .' has been created!');

        return true;

    }
}
