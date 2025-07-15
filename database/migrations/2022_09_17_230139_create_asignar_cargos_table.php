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
        Schema::create('asignar_cargos', function (Blueprint $table) {
            $table->id();
            //Llave foranea de user_id
            $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            //Llave foranea de cargo_id
            $table->foreignId('cargo_id')->nullable()
            ->constrained('cargos')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            //Llave foranea de gestion_id
            $table->foreignId('gestion_id')
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
        Schema::dropIfExists('asignar_cargos');
    }
};
