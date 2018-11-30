<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('equipamento_id')->unsigned()->index('registros_equipamento_id_foreign');
			$table->string('descricao', 191);
			$table->date('datalimite');
			$table->integer('tipo')->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registros');
	}

}
