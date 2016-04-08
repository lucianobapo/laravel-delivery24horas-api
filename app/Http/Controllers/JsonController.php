<?php

namespace App\Http\Controllers;

use App\Models\RepositoryLayer\ProductGroupRepositoryInterface;
use App\Models\RepositoryLayer\ProductRepositoryInterface;
use App\Repositories\MetodosParaRelatoriosDeOrdem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Collective\Remote\RemoteFacade as SSH;

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
        $commands = [
            'composer install',
            'cd /home/ubuntu/laravel-delivery24horas-api',
            'git pull',
        ];
        SSH::run($commands, function($line)
        {
            logger($line);
            echo $line.PHP_EOL;
        });
//        logger($request);
        return json_encode(['teste'=> $request]);
    }
}
