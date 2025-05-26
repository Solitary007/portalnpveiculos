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
        Schema::create('test_drives', function (Blueprint $table) {
            $table->uuid();
            $table->string('nome');
            $table->string('veiculo');
            $table->text('obs')->nullable();
            $table->timestamp('saida');
            $table->timestamp('entrada')->nullable();
            $table->string('status')->default('red');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_drives');
    }
};
