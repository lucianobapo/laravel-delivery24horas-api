<?php

namespace App\Http\Controllers;

use App\Models\RepositoryLayer\ProductGroupRepositoryInterface;
use App\Models\RepositoryLayer\ProductRepositoryInterface;
use App\Repositories\MetodosParaRelatoriosDeOrdem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class JsonController extends Controller
{
//    public function periodos(MetodosParaRelatoriosDeOrdem $metodosParaRelatoriosDeOrdem)
//    {
//        return $metodosParaRelatoriosDeOrdem->arrayDosPeriodos();
//    }

    public function categorias(ProductGroupRepositoryInterface $productGroupRepository)
    {
        return $productGroupRepository->collectionCategorias();
    }

    public function relatorios(MetodosParaRelatoriosDeOrdem $metodosParaRelatoriosDeOrdem)
    {
        return $metodosParaRelatoriosDeOrdem->arrayDosPeriodos();
    }

//    public function grupoProdutos(ProductGroupRepositoryInterface $productGroupRepository)
//    {
//        return $productGroupRepository->collectionProductGroups();
//    }

//    public function produtos(ProductRepositoryInterface $productRepository)
//    {
//        return $productRepository->collectionProducts();
//    }

    public function produtosDelivery(ProductRepositoryInterface $productRepository, $categ)
    {
        return $productRepository->collectionProductsDelivery($categ);
    }

    public function gitPull(Request $request)
    {
        $exitCode = Artisan::call('gpull');
//        if (config('app.env')=='production'){
//            $process = new Process('cd /home/ubuntu/laravel-delivery24horas-api && composer install && git pull');
//        } else {
//            $process = new Process('ls && cd /home/luciano/Code/laravel-delivery24horas-api && composer install -d=/home/luciano/Code/laravel-delivery24horas-api');
////            $process = new Process("echo 'hackerL2' | sudo -S -H -u teste bash -c 'ls'");
//        }
//        $process->run();
////
//        // executes after the command finishes
//        if (!$process->isSuccessful()) {
//            throw new ProcessFailedException($process);
//        }
////        $output = $process->getOutput();
//        $output = $process->getIncrementalOutput();

//        $output = [];
//        exec('composer install', $output);
//        exec('cd /home/ubuntu/laravel-delivery24horas-api && git pull', $output);
//        $commands = [
//            'composer install',
//            'cd /home/ubuntu/laravel-delivery24horas-api',
//            'git pull',
//        ];
//        SSH::run($commands, function($line)
//        {
//            logger($line);
//            echo $line.PHP_EOL;
//        });
//        logger($request);
        return json_encode(['teste'=> Artisan::output()]);
//        return json_encode(['teste'=> $output]);
    }
}
