<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('work_summery')->nullable();
            $table->longText('company_details')->nullable();
            $table->longText('education_details')->nullable();
            $table->string('exprience_summery')->nullable();
            $table->string('cover_letter')->nullable();
            $table->string('race_ethnicity')->nullable();
            $table->string('gender')->nullable();
            $table->integer('terms_condition')->nullable();
            $table->integer('job_id')->nullable();
            $table->longText('others')->nullable();
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
        Schema::dropIfExists('job_applies');
    }
}
