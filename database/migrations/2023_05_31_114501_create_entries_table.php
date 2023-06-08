<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('slug',200);
            $table->string('author',100);
            $table->string('desc',250);
            $table->text('content');
            $table->unsignedInteger('category');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('entries');
    }
};
