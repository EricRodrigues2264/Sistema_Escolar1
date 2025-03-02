<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return  new class extends Migration {
    public function up()

    {  
        Schema::create('alunos', function (Blueprint $table){
            $table->id();
            $table->string('nome');
            $table->string('email')->nullable()->unique();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExist('alunos');
    }
};
