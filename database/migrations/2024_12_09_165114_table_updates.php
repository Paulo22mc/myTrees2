<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('updates', function (Blueprint $table) {
            $table->id();  // ID de la actualización

            // Relación con el árbol (idTree)
            $table->unsignedBigInteger('idTree');
            $table->foreign('idTree')->references('id')->on('tree')->onDelete('cascade');  

            // Relación con el usuario (idUser)
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('Users')->onDelete('cascade');  

            // Fecha de la actualización
            $table->timestamp('date')->useCurrent();  

            // Tamaño de la actualización
            $table->decimal('size', 8, 2); 

            // Ruta de la foto
            $table->string('photos');  

            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('updates');
    }
};
