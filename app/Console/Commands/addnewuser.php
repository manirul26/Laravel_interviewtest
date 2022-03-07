<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Hash;

class addnewuser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The Artisan Commands will create user without registration';

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
     * @return int
     */
    public function handle()
    {
        $input['name'] = $this->ask('Your name?');
        $input['email'] = $this->ask('Your email?');
        $input['password'] = $this->secret('What is the password?');
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        $this->info('Data added successfully');
       // return 0;
    }
}
