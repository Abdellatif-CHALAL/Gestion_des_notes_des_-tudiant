<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->integer('id_etudiant')->unsigned();
            $table->foreign('id_etudiant')->references('id')->on('etudiants')->onDelete('cascade');

            $table->integer('id_matiere')->unsigned();
            $table->foreign('id_matiere')->references('id')->on('matieres')->onDelete('cascade');
            $table->integer('note')->unsigned();
            $table->primary(['id_etudiant', 'id_matiere']);
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
        Schema::dropIfExists('notes');
    }
}
