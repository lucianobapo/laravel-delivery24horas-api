<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

abstract class TableSeeder extends Seeder
{
    protected $classSeeder = Illuminate\Database\Eloquent\Model::class;

    protected function start(){
        if (DB::connection()->getName() == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        (new $this->classSeeder)->truncate();
    }
    protected function end(){
        if (DB::connection()->getName() == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
    }

    public function run()
    {
        $this->start();
        $this->seed();
        $this->end();
    }

    abstract protected function seed();
}