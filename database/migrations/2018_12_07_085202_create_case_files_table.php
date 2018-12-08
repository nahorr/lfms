<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_case_id')->unsigned();
            $table->foreign('client_case_id')->references('id')->on('client_cases')->onDelete('cascade');
            $table->string('file_name')->nullable();
            $table->string('file_description')->nullable();
            $table->string('case_file')->nullable();
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
        Schema::dropIfExists('case_files');
    }
}
