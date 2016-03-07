<?php

class PartnerTableSeeder extends TableSeeder
{
    protected $classSeeder = App\Models\Partner::class;

    protected function seed()
    {
        factory($this->classSeeder, 10)->create();
    }
}