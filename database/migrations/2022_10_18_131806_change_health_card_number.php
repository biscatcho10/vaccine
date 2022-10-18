<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHealthCardNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_answers', function (Blueprint $table) {
            $table->dropForeign('request_answers_patient_hcm_foreign');
        });
        
        Schema::table('patients', function (Blueprint $table) {
            $table->dropUnique('patients_health_card_num_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            //
        });
    }
}
