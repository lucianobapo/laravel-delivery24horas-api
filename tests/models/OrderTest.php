<?php


class OrderTest extends ModelsTestCase
{
    protected $testClass = App\Models\Order::class;

    protected $testDateFields = ['posted_at'];

    public function test_relation_with_partner()
    {
        // Instantiate, fill with values, save and return
        $record = factory($this->testClass)->create(['partner_id' => factory(App\Models\Partner::class)->create()->id]);
        $this->assertEquals( $record->partner_id, $record->partner->id );
    }
}
