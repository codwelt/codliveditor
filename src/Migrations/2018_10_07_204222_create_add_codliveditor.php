<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddCodliveditor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codliveditor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreTemplate');
            $table->longText('html')->nullable($value = true);
            $table->longText('css')->nullable($value = true);
            $table->longText('js')->nullable($value = true);
            $table->longText('php')->nullable($value = true);
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
        Schema::dropIfExists('codliveditor');
    }
}
