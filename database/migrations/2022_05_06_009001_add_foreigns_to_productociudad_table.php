<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToProductociudadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productociudad', function (Blueprint $table) {
            $table
                ->foreign('ciudades_id')
                ->references('id')
                ->on('ciudades')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('productos_id')
                ->references('id')
                ->on('productos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productociudad', function (Blueprint $table) {
            $table->dropForeign(['ciudades_id']);
            $table->dropForeign(['productos_id']);
        });
    }
}
