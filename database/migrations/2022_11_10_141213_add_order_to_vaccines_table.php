<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderToVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaccines', function (Blueprint $table) {
            $table->unsignedBigInteger('order')->nullable()->after('exceptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaccines', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
