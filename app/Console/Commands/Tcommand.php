<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Tcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:tcommand {param1}{param2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '测试demo';

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
        //
//        dd($this->arguments());
        var_dump($this->argument('param1'));
        var_dump($this->argument('param2'));
        dd('123');
    }
}
