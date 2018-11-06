<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConfigCodliveditor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codliveditorconf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipostorage')->default('local');
            $table->boolean('tiporender')->default(0);
            $table->boolean('html')->default(1);
            $table->boolean('css')->default(1);
            $table->boolean('js')->default(0);
            $table->boolean('php')->default(0);
            $table->integer('idframeworkfront')->default(0);
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
        Schema::dropIfExists('codliveditorconf');
    }
}
