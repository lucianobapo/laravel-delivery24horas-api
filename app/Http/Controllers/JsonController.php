<?php

namespace App\Http\Controllers;

use ErpNET\App\Interfaces\OrderServiceInterface;
use ErpNET\App\Interfaces\PartnerServiceInterface;
use ErpNET\App\Interfaces\ProductServiceInterface;
use ErpNET\App\Models\RepositoryLayer\ProductGroupRepositoryInterface;
use ErpNET\App\Models\RepositoryLayer\ProductRepositoryInterface;
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

    public function produtosDelivery(ProductServiceInterface $productService, $categ)
    {
        return $productService->collectionProductsDelivery($categ);
    }

    public function partnerProviderId(PartnerServiceInterface $partnerService, $id)
    {
        return $partnerService->jsonPartnerProviderId($id);
    }

    public function gitPull(Request $request)
    {
        $data = $request->all();
        if($request->method()=='POST' && $data['pusher']['name']=='lucianobapo'){
            $exitCode = Artisan::call('gpull');
            $return = ['posted' => $data,'gpull'=>Artisan::output()];
        } else $return = $data;

        return response()->json($return);
    }


    public function ordem(Request $request, OrderServiceInterface $orderService)
    {
        $data = $request->all();
        logger($data);
        $returnJson = $orderService->createDeliverySalesOrderWithJson(json_encode($data['message']));
        $returnObj = json_decode($returnJson);
        if (property_exists($returnObj,'error'))
            return $returnJson;
        else
            return response()->json(["error"=>true,"message"=>"Json error"]);
    }
}
