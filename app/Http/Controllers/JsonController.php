<?php

namespace App\Http\Controllers;

use App\Models\RepositoryLayer\ProductGroupRepositoryInterface;
use App\Models\RepositoryLayer\ProductRepositoryInterface;
use App\Repositories\MetodosParaRelatoriosDeOrdem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
}
