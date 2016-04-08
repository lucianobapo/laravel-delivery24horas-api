<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class GitPull extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gpull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatic Git pull';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (config('app.env')=='production'){
            $process = new Process('cd /home/ubuntu/laravel-delivery24horas-api && composer install && git pull');
        } else {
            $process = new Process('cd /home/luciano/Code/laravel-delivery24horas-api && composer install');
        }
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
//        $output = $process->getOutput();
        $output = $process->getIncrementalOutput();

        $this->comment(($output));
    }
}
