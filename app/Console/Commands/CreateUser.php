<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nolego:users {quantity=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates fake user';

    /**
     * Create a new command instance.
     *
     * @param $quantity
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
        for ($i = 0; $i < $this->argument('quantity'); $i++) {

            $email = str_random(7) . '@example.com';

            if (User::where('email', $email)->first()) {
                $i--;
                continue;
            }


            User::create([
                'name'          => 'John ' . str_random(7),
                'email'         => $email,
                'verified'      => 1,
                'ip_address'    => '555.555.555.555'
            ]);
        }
    }
}
