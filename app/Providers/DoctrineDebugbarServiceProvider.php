<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DoctrineDebugbarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $debugStack = new \Doctrine\DBAL\Logging\DebugStack();
        app('em')->getConnection()->getConfiguration()->setSQLLogger($debugStack);
        $debugbar = app('debugbar');
        $debugbar->addCollector(new \DebugBar\Bridge\DoctrineCollector($debugStack));

//        if($this->app['config']->get('debugbar.enabled')){
//            $debugbar = $this->app['debugbar'];
//            if ($debugbar && $this->app['config']->get('debugbar.collectors.db', true) && isset($this->app['db'])) {
//                try {
//                    $doctrine = $this->app['em'];
//                    if ($doctrine) {
//                        $pdo = $doctrine->getConnection()->getWrappedConnection();
//
//                        dd($debugbar);
//                        foreach ($debugbar->getCollectors() as $collector) {
//                            if ($collector instanceof PDOCollector) {
//                                $collector->addConnection(new TraceablePDO($pdo));
//                                break;
//                            }
//                        }
//                    }
//                } catch (\PDOException $e) {
//                }
//            }
//        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
