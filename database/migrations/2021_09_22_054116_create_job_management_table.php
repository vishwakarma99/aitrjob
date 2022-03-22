<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_management', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->index();
            $table->string('company_id');
            $table->string('job_id');
            $table->tinyInteger('job_status')->default(1);
            $table->datetime('schedule_for');
            $table->string('interview_by')->nullable();
            $table->integer('online_test')->nullable();
            $table->integer('offline_test')->nullable();
            $table->integer('telephonic_round')->nullable();
            $table->integer('hr_round')->nullable();
            $table->string('resume');
            $table->date('joining_date')->nullable();
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
        Schema::dropIfExists('job_management');
    }
}
