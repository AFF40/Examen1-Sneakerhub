<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('productos', function (Blueprint $table) {
        $table->foreign('marca_id')->references('id')->on('marcas');
        $table->foreign('categoria_id')->references('id')->on('categorias');
    });
}

public function down()
{
    Schema::table('productos', function (Blueprint $table) {
        $table->dropForeign(['marca_id']);
        $table->dropForeign(['categoria_id']);
    });
}
};
