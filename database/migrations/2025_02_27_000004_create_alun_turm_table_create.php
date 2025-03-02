<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
  {
      public function up()
      {
          Schema::create('aluno_turmas', function (Blueprint $table) {
              $table->id();
              $table->foreignId('turma_id')->constrained()->onDelete('cascade');
              $table->foreignId('aluno_id')->constrained()->onDelete('cascade');
              $table->timestamps();
          });
      }

      public function down()
      {
          Schema::dropIfExists('aluno_turmas');
      }
  };
