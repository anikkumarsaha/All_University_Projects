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
        Schema::create('movies', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('rating', $precision = 2, $scale = 1)->default(0);
            $table->integer('views')->default(0);
            $table->string('genre');
            $table->string('movie');
            $table->string('banner');
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
        Schema::dropIfExists('movies');
    }
};
