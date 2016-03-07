<?php

class ItemOrderTest extends ModelsTestCase
{
    protected $testClass = App\Models\ItemOrder::class;

    public function test_relation_with_order()
    {
        // Instantiate, fill with values, save and return
        $record = factory($this->testClass)->create(['order_id' => factory(App\Models\Order::class)->create()->id]);
        $this->assertEquals( $record->order_id, $record->order->id );
    }

    public function test_relation_with_cost_allocate()
    {
        // Instantiate, fill with values, save and return
        $record = factory($this->testClass)->create(['cost_id' => factory(App\Models\CostAllocate::class)->create()->id]);
        $this->assertEquals( $record->cost_id, $record->cost->id );
    }
}
