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
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->text('descripcion');
        $table->decimal('precio', 10, 2);
        $table->integer('stock')->default(0);
        $table->unsignedBigInteger('marca_id');
        $table->unsignedBigInteger('categoria_id');
        $table->string('imagen_url')->nullable();
        $table->timestamps();

        // Agrega las claves foráneas después con una migración separada
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
