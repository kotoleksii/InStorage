<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
            $table->string('inventory_number');
            $table->date('date_start');
            $table->string('type');
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('sum');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('score_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees');

            $table->foreign('score_id')
                ->references('id')
                ->on('scores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
