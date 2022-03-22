<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantWorkHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_work_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->index();
            $table->string('name_of_company');
            $table->string('other_company');
            $table->string('work_status');
            $table->string('work_exp_years');
            $table->string('work_exp_months');
            $table->string('director_reference');
            $table->string('industry_type');
            $table->string('functional_area');
            $table->string('annual_salary');
            $table->string('date_of_joining');
            $table->string('date_of_leaving');
            $table->string('achivements');
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
        Schema::dropIfExists('applicant_work_histories');
    }
}
