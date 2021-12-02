<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthorsTable extends Migration {

	public function up()
	{
		Schema::create('authors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('nickname')->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('authors');
	}
}
