<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('amount')->default(0);
            $table->boolean('definded_period')->nullable();
            $table->boolean('require_hcn')->default(false);
            $table->boolean('need_comment')->default(false);
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->boolean('has_diff_ages')->default(false);
            $table->json('diff_ages')->nullable();
            $table->json('exceptions')->nullable();
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
        Schema::dropIfExists('vaccines');
    }
}
