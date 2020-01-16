<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
            $table->dropForeign('clients_file_id_foreign');
            $table->dropColumn('file_id');
            $table->dropForeign('clients_anuncio_id_foreign');
            $table->dropColumn('anuncio_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
            $table->bigInteger('anuncio_id');
            $table->bigInteger('fie_id');
        });
    }
}
