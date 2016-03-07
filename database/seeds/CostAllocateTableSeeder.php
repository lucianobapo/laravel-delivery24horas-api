<?php

class CostAllocateTableSeeder extends TableSeeder
{
    protected $classSeeder = App\Models\CostAllocate::class;

    protected function seed()
    {
        factory($this->classSeeder, 5)->create();
    }
}