<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Listing;
use App\Models\User;

class CreateListings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nolego:listings {quantity=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates listings';

    private $amazonScrape;

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
        $users = User::all()->pluck('id');
        $img = json_decode('{"1":"https://marketplace-kit.s3.amazonaws.com/default_listing.jpg"}');

        for ($i = 0; $i < $this->argument('quantity'); $i++) {

            Listing::create([
                'category_id'   => 1,
                'user_id'       => $users->random(),
                'pricing_model_id' => 1,
                'title'      => str_random(12),
                'price'         => rand(0, 1000),
                'photos'        => $img
            ]);
        }
    }
}
