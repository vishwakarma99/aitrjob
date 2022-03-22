<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->index();
            $table->string('job_title');
            $table->string('job_desc');
            $table->string('job_skill');
            $table->integer('work_exp_from');
            $table->integer('work_exp_to');
            $table->integer('current_vacancy');
            $table->string('location_name');
            $table->string('job_industry');
            $table->string('company_hiring_for');
            $table->string('job_functional_area');
            $table->string('job_role');
            $table->string('job_shift');
            $table->string('job_type');
            $table->string('education_required');
            $table->string('candidate_pofile_desc');
            $table->string('job_payment');
            $table->string('job_live');
            $table->string('job_link');
            $table->string('annual_salary');
            $table->string('salary_range');            
            $table->tinyInteger('job_status')->default(1);
            $table->timestamps();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_masters');
    }
}
