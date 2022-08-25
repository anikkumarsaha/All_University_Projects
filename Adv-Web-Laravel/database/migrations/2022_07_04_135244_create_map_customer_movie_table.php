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
        Schema::create('map_customer_movie', function (Blueprint $table) {
            
            $table->id();            
            $table->foreignId('c_id')->constrained('accounts');
            $table->foreignId('m_id')->constrained('movies');
            $table->decimal('rating')->default(-1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map_user_movie');
    }
};
