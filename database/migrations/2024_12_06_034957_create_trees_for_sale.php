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
        Schema::create('tree', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idSpecie')->constrained()->onDelete('cascade');
            $table->foreignId('idFriend')->constrained('users')->onDelete('cascade');
            $table->string('ubication');
            $table->enum('status', ['available', 'sold'])->default('available');
            $table->integer('size');
            $table->decimal('price', 10, 2);
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trees_for_sale');
    }
};
