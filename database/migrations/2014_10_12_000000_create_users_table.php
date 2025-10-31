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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ci', 8)->unique();
            $table->string('nombre', 25);
            $table->string('apPaterno', 20);
            $table->string('apMaterno', 20);
            $table->date('fechaNacimiento');
            $table->date('fechaJuramento');
            $table->string('profesion', 60);
            $table->text('presentacion');
            $table->string('intereses', 200);
            $table->string('puntosAMejorar', 200);
            $table->string('foto');//->nullable();
            $table->string('curriculum')->nullable();
            $table->string('celular', 16)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('rol');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('web')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
