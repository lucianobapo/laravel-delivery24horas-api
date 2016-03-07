<?php

class ItemOrderTableSeeder extends TableSeeder
{
    protected $classSeeder = App\Models\ItemOrder::class;

    protected function seed()
    {
        $CostAllocates = (new \App\Models\CostAllocate)->get();
        if (count($CostAllocates)>0) {
            foreach ($CostAllocates as $costAllocate) {
                factory($this->classSeeder, 5)->create(['cost_id'=>$costAllocate->id]);
            }
        } else factory($this->classSeeder, 3)->create();
    }
}