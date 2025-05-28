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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();

            $table->text('descricao'); // nome do veiculo
            $table->string('tipoEstoque'); // novo, semi-novo, usado, etc.
            $table->string('marca');
            $table->string('modelo');
            $table->string('anoModelo');
            $table->string('anoFabricacao');
            $table->string('cor');
            $table->string('placa')->unique();
            $table->string('chassi')->unique();
            $table->string('combustivel')->unique();
            $table->double('valorCompra', 10, 2)->unique();
            $table->double('valorVenda', 10, 2)->unique();
            $table->string('status')->default('disponivel'); // disponivel, vendido, reservado

            $table->unsignedBigInteger('user_id')->nullable(); // ID usuario editor (Auditoria)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_categoria')->nullable(); // ID da categoria do veiculo
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
