<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
<<<<<<< HEAD
            $table->bigInteger('ISBN');
=======
            $table->increments('id');
            $table->string('ISBN', 20);
>>>>>>> 7098f1cc3bc37baad707eded095315fd12194d59
            $table->string('title', 255);
            $table->string('image', 255)->nullable();
            $table->string('author', 255)->nullable();
            $table->text('summary')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
