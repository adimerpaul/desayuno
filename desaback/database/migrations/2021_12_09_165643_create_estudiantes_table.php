<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string("estudiante");
            $table->string("tutor");
            $table->string("ciestudiante");
            $table->string("citutor");
            $table->string("rude");
            $table->string("parentesco");
            $table->string("colegio");
            $table->integer("monto")->default(300);
            $table->string("estado")->default("NO CANCELADO");
            $table->date("fecha")->nullable()->default(NULL);
            $table->string("usuario")->default("");
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
        Schema::dropIfExists('estudiantes');
    }
}
