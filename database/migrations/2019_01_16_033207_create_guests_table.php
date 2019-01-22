<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('party_id');
            $table->string('name')->nullable();
            $table->boolean('unknown')->default(false);
            $table->boolean('vegetarian')->default(false);
            $table->string('dietary_restrictions')->nullable();
            $table->timestamps();

            $table->foreign('party_id')
                ->references('id')
                ->on('parties')
                ->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
