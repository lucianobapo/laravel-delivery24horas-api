<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CostAllocateTableSeeder::class);
        $this->call(PartnerTableSeeder::class);

        $this->call(ItemOrderTableSeeder::class);
    }
}
