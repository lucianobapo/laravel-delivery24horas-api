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
        $data = $request->all();
        $exitCode = Artisan::call('gpull');
        $return = $data['pusher']->name;//.Artisan::output();
//        dd($data['pusher']);
//        if($request->method()=='POST' && $data->pusher->name=='lucianobapo'){
//            $exitCode = Artisan::call('gpull');
//            $return = ['posted' => $data,'gpull'=>Artisan::output()];
//        } else $return = $data;

        return response()->json($return);
    }
}
