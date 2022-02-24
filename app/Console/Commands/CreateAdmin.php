<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create first admin user';

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
        $this->info('Creating Admin User.');
        try {
            $status=exec('git status');

//            User::create([
//                'name'=>'Admin',
//                'email'=>'admin@gmail.com',
//                'password'=>bcrypt('admin')
//            ]);
            $this->info( $status);
        }catch (\Throwable $e)
        {
            $this->info("something went wrong.");
        }


    }
}
