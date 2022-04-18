<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vaccine_id')->constrained('vaccines')->onDelete('cascade');
            $table->string('patient_hcm');
            $table->foreign('patient_hcm')->references('health_card_num')->on('patients')->onDelete('cascade');
            $table->text('eligapility');
            $table->text('comment')->nullable();
            $table->date('day_date');
            $table->string('day_name');
            $table->string('day_time');
            $table->string('age')->nullable();
            $table->json('answers');
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
        Schema::dropIfExists('request_answers');
    }
}
