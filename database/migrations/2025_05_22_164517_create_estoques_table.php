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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->string('observacao')->nullable();
            $table->string('ipva')->nullable();
            $table->string('lic')->nullable();
            $table->string('chave')->nullable();
            $table->string('loja')->nullable();
            $table->string('tipo_estoque')->nullable();
            $table->string('situacao')->nullable();
            $table->string('vistoria_cautelar')->nullable();
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->string('cor')->nullable();
            $table->string('cbl')->nullable();
            $table->string('fab_ano')->nullable();
            $table->string('placa')->nullable();
            $table->string('fipe')->nullable();
            $table->string('custo')->nullable();
            $table->string('ga')->nullable();
            $table->string('venda')->nullable();
            $table->string('preco_oferta')->nullable();
            $table->string('km')->nullable();
            $table->string('origem')->nullable();
            $table->string('est_venda')->nullable();
            $table->date('data_entrada')->nullable();
            $table->string('nota_fiscal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
