<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->string('name',200);
            $table->string('slug',200);
            $table->string('desc',1000)->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('main')->default(1); //Esto hara que salga o no la categoria en el menu
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories');
        });
    }

    public function down(){
        Schema::dropIfExists('subcategories');
    }
};
