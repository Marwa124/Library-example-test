<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration {

	public function up()
	{
		Schema::create('books', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('serial')->nullable();
			$table->enum('type', array('science_fiction', 'crime', 'action', 'biography', 'true_story', 'human_development'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('books');
	}
}
