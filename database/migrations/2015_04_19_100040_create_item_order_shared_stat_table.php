<?php

use ErpNET\App\Repositories\BaseMigration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemOrderSharedStatTable extends BaseMigration {

    protected $table = 'item_order_shared_stat';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function upMigration()
	{
        $this->createTable(function(Blueprint $table){
			$table->increments('id');
			$table->timestamps();

			$table->integer('item_id')->unsigned()->index();
			$table->integer('shared_stat_id')->unsigned()->index();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function downMigration()
	{
        $this->dropTable();
	}

}
