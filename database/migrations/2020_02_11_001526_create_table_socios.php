<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSocios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre")->nullable();
            $table->string("identificacion")->nullable();
            $table->string("telefono")->nullable();
            $table->string("direccion")->nullable();
            $table->string("email")->nullable();
            $table->string("ciudad")->nullable();
            $table->string("procedencia")->nullable();
            $table->bigInteger("IdClienteBase")->nullable();
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
        Schema::dropIfExists('socios');
    }
}
