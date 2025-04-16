<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('notes');
            $table->string('Scaling')->nullable();
            $table->integer('physical_damage')->nullable();
            $table->integer('magical_damage')->nullable();
            $table->integer('fire_damage')->nullable();
            $table->integer('lightning_damage')->nullable();
            $table->integer('holy_damage')->nullable();
            $table->integer('critical_chance')->nullable();
            $table->integer('level_required')->nullable();
            $table->integer('physical_defense')->nullable();
            $table->integer('magical_defense')->nullable();
            $table->integer('fire_defense')->nullable();
            $table->integer('lightning_defense')->nullable();
            $table->integer('holy_defense')->nullable();
            $table->integer('boost')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
