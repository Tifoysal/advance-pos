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
    protected $signature = 'gs';

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
            $this->info( "status: ".exec('git status'));
            $this->info("commit: ".exec('git commit -am "message"' ));
            $this->info("pull :".exec('git pull'));
            $this->info("push" .exec('git push'));

//            User::create([
//                'name'=>'Admin',
//                'email'=>'admin@gmail.com',
//                'password'=>bcrypt('admin')
//            ]);

        }catch (\Throwable $e)
        {
            $this->info("something went wrong.");
        }


    }
}
