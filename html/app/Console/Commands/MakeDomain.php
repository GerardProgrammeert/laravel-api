<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeDomain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain:make {domain : Domain name of the api}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $domain = $this->argument('domain');

        echo $domain;

        return Command::SUCCESS;
    }
}
