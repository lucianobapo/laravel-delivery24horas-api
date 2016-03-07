<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 05/01/16
 * Time: 14:20
 */

namespace App\Repositories;

use App\Models\RepositoryLayer\CostAllocateRepositoryInterface;
use App\Models\RepositoryLayer\OrderRepositoryInterface;
use Carbon\Carbon;
//use Symfony\Component\DomCrawler\Form;

class MetodosParaRelatoriosDeOrdem
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var CostAllocateRepositoryInterface
     */
    private $costAllocateRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, CostAllocateRepositoryInterface $costAllocateRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->costAllocateRepository = $costAllocateRepository;
    }

    protected function arrayDosCustos(&$collection)
    {
        $result = [];
        foreach($collection as $cost){
            $result[$cost->getNome()]= $cost->getNumero() . ' - ' . $cost->getDescricao();
        }
        return $result;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection|\Doctrine\Common\Collections\ArrayCollection $Orders
     * @return array
     */
    protected function arrayDeSomaDosItens($Orders)
    {
        $sum2 = [];
        foreach ($Orders as $order) {
            foreach ($order->getItemOrders() as $orderItem) {
                isset($sum2[$orderItem->getCostAllocate()->getNome()][$order->getTypeId()])?
                    $sum2[$orderItem->getCostAllocate()->getNome()][$order->getTypeId()] = ($orderItem->getValorUnitario()*$orderItem->getQuantidade())+
                        $sum2[$orderItem->getCostAllocate()->getNome()][$order->getTypeId()]:
                    $sum2[$orderItem->getCostAllocate()->getNome()][$order->getTypeId()] = ($orderItem->getValorUnitario()*$orderItem->getQuantidade());//
            }
        }
        return $sum2;
    }

    protected function tabelaValoresDeOrdemDeVendaPorCusto(array $valores=[], array $titulos=[])
    {
        $somaMatriz = [];
        foreach ($titulos as $nome => $descricao) {
            $matriz[$nome]['nomes'] = $descricao;
        }
        foreach ($valores as $nomeDoCusto => $arrayDeOrdensEValores) {
            foreach ($arrayDeOrdensEValores as $keyTipoOrdem => $valor) {
                $matriz[$nomeDoCusto][$keyTipoOrdem] = $valor;
                $somaMatriz[$keyTipoOrdem] =  (isset($somaMatriz[$keyTipoOrdem]))?$somaMatriz[$keyTipoOrdem]+$valor:$valor;
            }
        }
        return ([
            'matriz'=>$matriz,
            'somaMatriz'=>$somaMatriz,
        ]);
    }

    public function arrayDosPeriodos()
    {
        $CostAllocates = $this->costAllocateRepository->collectionCostAllocate();

        $arrayDosCustos = $this->arrayDosCustos($CostAllocates);

        $carbon = new Carbon;
        $Orders = $this->orderRepository->collectionOrdersItemsCosts();
//        dd($Orders);
//        $Orders = (new Order)->with('orderItems','orderItems.cost')->get();
        $countMes = 0;
        $arr=[];
        do {
            $comecoDoMes = $carbon->now()->subMonths($countMes)->firstOfMonth();
            $fimDoMes = $carbon->now()->subMonths($countMes)->endOfMonth();
            $OrdersFiltred = $Orders
                ->filter(function($item) use ($comecoDoMes, $fimDoMes) {
                    if ($item->getPostedAt()>=$comecoDoMes && $item->getPostedAt()<=$fimDoMes){
                        return $item;
                    }
                });

            if (count($OrdersFiltred)>0) {
                $arr[$comecoDoMes->timestamp] = array_merge(
                    ['titulo' => $comecoDoMes->format('F Y')],
                    $this->tabelaValoresDeOrdemDeVendaPorCusto(
                        $this->arrayDeSomaDosItens($OrdersFiltred),
                        $arrayDosCustos
                    ));
            }
            $countMes++;
        } while ( (count($OrdersFiltred)>0) || ($countMes<2));

//        dd($arr);

        $antes = 0;
        foreach ($arr as $key => $value) {
            $arr[$key]['id']=$key;
            if ($antes == 0) $antes = $key;
            else {
                $arr[$antes]['depois']=$key;
                $arr[$key]['antes']=$antes;
                $antes = $key;
            }
        }

        reset($arr);
        return $arr;
    }
}