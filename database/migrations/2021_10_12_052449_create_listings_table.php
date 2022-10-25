<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('tole');
            $table->string('municipality');
            $table->integer('wardno');
            $table->integer('price');
            $table->string('thumbnail');
            $table->string('tbphoto')->nullable();
            $table->string('hallphoto')->nullable();
            $table->string('kitchenphoto')->nullable();
            $table->string('psphoto')->nullable();
            $table->string('froom')->nullable();
            $table->string('sroom')->nullable();
            $table->string('type');
            $table->longText('info');
            $table->longText('rules');
            $table->boolean('isNegotiable')->default(false);
            $table->boolean('isAvailable')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->string('age_range');
            $table->string('tenant_type');
            $table->string('gender');
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
        Schema::dropIfExists('listings');
    }
}
