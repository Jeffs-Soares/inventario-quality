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
        Schema::create('registro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoria')->nullable(false);
            $table->unsignedBigInteger('item')->nullable(false);
            $table->string('nota_fiscal', 128);
            $table->date('data_aquisicao');
            $table->unsignedBigInteger('local')->nullable(false);
            $table->string('serial', 128);
            $table->string('modelo', 128);
            $table->string('marca', 128);
            $table->string('observacao');

             $table->foreign('categoria')->references('id')
                ->on('categoria')
                ->onDelete('cascade');

            $table->foreign('local')->references('id')
                ->on('local')
                ->onDelete('cascade');

            $table->foreign('item')->references('id')
                ->on('item')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro');
    }
};
