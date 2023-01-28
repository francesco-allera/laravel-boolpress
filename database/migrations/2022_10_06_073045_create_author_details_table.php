<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id'); // foreign key

            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->date('birth');
            $table->string('bio', 1024)->nullable();
            $table->string('website', 2048);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors');
            // same as write: author_details.author_id = authors.id
            // 'author_id' is the foreign key from the column 'id' from the table 'authors'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_details');
    }
}
