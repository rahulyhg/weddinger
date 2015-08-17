<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Hashing\Hasher;

class CreateUser extends Command
{
    /**
     * @var Laravel hashing implementation
     */
    private $hasher;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user.';

    /**
     * @param Hasher $hasher Laravel hashing implementation
     */
    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $email = $this->ask('Email?');

        $password = $this->secret('Password?');

        $user = new User;

        $user->email= $email;
        $user->password = $this->hasher->make($password);

        if (! $user->save()) {
            $this->error('Could not create user');
            return;
        }

        $this->info("$email created.");
    }
}
