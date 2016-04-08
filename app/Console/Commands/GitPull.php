<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
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
//            $process = new Process('cd /home/luciano/Code/laravel-delivery24horas-api && ls && composer install -d=/home/luciano/Code/laravel-delivery24horas-api');
//            $process = new Process("echo 'hackerL2' | sudo -S -H -u teste bash -c 'ls'");
        }
        $process->run();
//
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
//        $output = $process->getOutput();
        $output = $process->getIncrementalOutput();

//        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
//        $cmd = shell_exec("echo 'hackerL2' | sudo -S -H -u teste bash -c 'ls' ");
//        $cmd = shell_exec("composer install -d=/home/luciano/Code/laravel-delivery24horas-api");
//        $cmd = [];
//        exec("echo 'hackerL2\' | sudo -kS -H -u teste bash -c 'ls' ",$cmd);
//        exec("ls -la",$cmd);
//        exec("composer install -d=/home/luciano/Code/laravel-delivery24horas-api",$cmd);
//        $this->comment(PHP_EOL. $cmd .PHP_EOL);
        $this->comment(($output));
//        $this->comment(($cmd));

    }
}
