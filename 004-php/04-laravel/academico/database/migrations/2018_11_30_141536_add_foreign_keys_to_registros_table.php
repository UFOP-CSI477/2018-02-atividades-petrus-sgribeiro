<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRegistrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('registros', function(Blueprint $table)
		{
			$table->foreign('equipamento_id')->references('id')->on('equipamentos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('registros', function(Blueprint $table)
		{
			$table->dropForeign('registros_equipamento_id_foreign');
		});
	}

}
