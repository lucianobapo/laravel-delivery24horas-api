<?php

use App\Repositories\MetodosParaRelatoriosDeOrdem;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MetodosParaRelatoriosDeOrdemTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
//    public function testExample()
//    {
//        $this->assertTrue(true);
//    }

    /** @test */
    public function it_should_returns_array()
    {
//        $this->assertArrayHasKey('',$this->testClass->arrayValoresDeOrdemDeVendaPorCusto());
    }

    protected $testClass;

    public function setUp()
    {
        parent::setUp();
        $this->testClass = new MetodosParaRelatoriosDeOrdem();
    }

//    public function testArrayValoresDeOrdemDeVendaPorCusto(){
////        $record = factory(App\Models\ItemOrder::class, 5)->create();
////        dd($record->toArray());
//
////        $this->testClass->arrayDosCustos($record);
////        dd($this->testClass->arrayDosCustos($record));
//        $this->assertEquals([],$this->testClass->arrayValoresDeOrdemDeVendaPorCusto());
//    }
    public function testArrayDosCustos(){
        $CostAllocates = factory(App\Models\CostAllocate::class, 5)->create();
        $arrayDosCustos = $this->testClass->arrayDosCustos($CostAllocates);
        $this->assertNotCount(0, $arrayDosCustos);
        $this->assertArrayHasKey($CostAllocates->first()->nome,$arrayDosCustos);
//        echo(json_encode($arrayDosCustos));
    }

    public function testArrayDeSomaDosItens(){
        $CostAllocates = factory(App\Models\CostAllocate::class, 5)->create();
        $arrayDeSomaDosItens = [];
        foreach ($CostAllocates as $cost) {
            $ItemOrders = factory(App\Models\ItemOrder::class, 10)->create(["cost_id" => $cost->id]);
            $arrayDeSomaDosItens = $arrayDeSomaDosItens + $this->testClass->arrayDeSomaDosItens($ItemOrders);
        }

        $this->assertArrayHasKey($CostAllocates->first()->nome,$arrayDeSomaDosItens);
        $this->assertGreaterThan(0,array_sum($arrayDeSomaDosItens));
//        echo(array_sum($arrayDeSomaDosItens));
//        echo(json_encode($arrayDeSomaDosItens));
    }
}
