<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            try {
                $pdo = DB::connection()->getPdo();
            } catch (\PDOException $e) {
                Mail::send('emails.dbFail', ['error'=>$e->getMessage()], function ($m) {
                    $m->to('luciano.bapo@gmail.com', config('mail.from')['name'])->subject('Falha de conexão MySQL');
                });
            }
        })
            ->everyTenMinutes();
//            ->everyMinute();
    }
}
