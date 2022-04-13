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
        Schema::create('anime', function (Blueprint $table){
            $table->id();
            $table->string('url');
        });
        Schema::create('baguette', function (Blueprint $table){
            $table->id();
            $table->string('url');
        });
        Schema::create('dva', function (Blueprint $table){
            $table->id();
            $table->string('url');
        });
        Schema::create('hentai', function (Blueprint $table){
            $table->id();
            $table->string('url');
        });
        Schema::create('hug', function (Blueprint $table){
            $table->id();
            $table->string('url');
        });
        Schema::create('neko', function (Blueprint $table){
            $table->id();
            $table->string('url');
        });
        Schema::create('nsfwneko', function (Blueprint $table){
            $table->id();
            $table->string('url');
        });
        Schema::create('trap', function (Blueprint $table){
            $table->id();
            $table->string('url');
        });
        Schema::create('yuri', function (Blueprint $table){
            $table->id();
            $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime');
        Schema::dropIfExists('baguette');
        Schema::dropIfExists('dva');
        Schema::dropIfExists('hentai');
        Schema::dropIfExists('hug');
        Schema::dropIfExists('neko');
        Schema::dropIfExists('nsfwneko');
        Schema::dropIfExists('trap');
        Schema::dropIfExists('yuri');
    }
};
