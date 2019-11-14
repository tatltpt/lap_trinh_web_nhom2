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
            $table->bigIncrements('id');
            $table->string('book_name')->nullable();
            $table->string('book_slug')->index();
            $table->integer('book_category_id')->index()->default(0);
            $table->integer('book_author_id')->default(0)->index();
            $table->integer('book_number')->default(0);
            $table->integer('book_price')->default(0);
            $table->tinyInteger('book_active')->default(1)->index();
            $table->tinyInteger('book_hot')->default(0);
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
        Schema::dropIfExists('books');
    }
}
