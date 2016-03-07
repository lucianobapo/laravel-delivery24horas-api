<?php

namespace App\Http\Controllers;

use App\Repositories\MetodosParaRelatoriosDeOrdem;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RelatoriosController extends Controller
{
    public function index(MetodosParaRelatoriosDeOrdem $metodosParaRelatoriosDeOrdem)
    {
//        dd($this->repository->findByMandante('ilhanet'));
//        json_encode($this->repository->findAll());
//        dd(($this->repository->collectionOrdersItemsCosts()));
//        dd(($this->repository->findAll()));
//        dd(($this->repository->findAll()->toArray()));
//        dd($this->repository->find(1)->toArray());
//        dd($this->repository->find(1));
//        return $this->repository->find(1);

        return view('components.appMain')->with([
            'mesesContent' => $metodosParaRelatoriosDeOrdem->arrayDosPeriodos(),
        ]);
    }
}
