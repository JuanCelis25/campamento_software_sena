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
        Schema::create('bootcamps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('website');
            $table->string('phone');
            $table->float('average_rating', 8, 2);
            $table->decimal('average_cost', $precision = 8, $scale = 2);
            $table->foreignId('bootcamp_id')->constrained();
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
        Schema::dropIfExists('bootcamps');
    }
};
