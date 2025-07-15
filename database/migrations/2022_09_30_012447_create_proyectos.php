<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo', 10);
            $table->string('objetivoGeneral')->nullable();
            $table->text('objetivosEspecificos')->nullable();
            $table->string('ciudad', 50);
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->text('ejecucion');
            $table->string('resumen');
            $table->string('fotoPrincipal');
            $table->string('fotoPortada');
            $table->string('perfil')->nullable();
            $table->string('informe')->nullable();
            //Llave foranea de gestion_id
            $table->foreignId('gestion_id')->nullable()
            ->constrained('gestions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
};
