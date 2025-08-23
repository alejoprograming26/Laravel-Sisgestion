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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matriculacion_id')->constrained('matriculacions')->onDelete('cascade');
            $table->decimal('monto', 10, 2);
            $table->string('metodo_pago');
            $table->string('descripcion');
            $table->date('fecha_pago');
            $table->enum('estado', ['pendiente', 'completado', 'cancelado', 'anulado'])->default('completado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
