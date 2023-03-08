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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            
            $table->string('tipo');

            $table->mediumText('description')->nullable();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('clieprov_id');
            $table->unsignedBigInteger('user_id');

            $table->decimal('pintada', 12, 5);
            $table->string('pintada_tipo')->nullable();//ml o m2

            $table->string('metros'); // valor de ml o m2 
            $table->string('medida')->nullable(); // del producto 



            $table->decimal('cantidad', 12, 5);
            $table->boolean('status');
            $table->string('lote')->nullable();


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
        Schema::dropIfExists('movements');
    }
};
