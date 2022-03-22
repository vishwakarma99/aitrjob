<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->string('company_name');
            $table->string('company_website');
            $table->string('email_address');
            $table->string('contact_no');
            $table->string('state');
            $table->string('city');
            $table->string('pincode');
            $table->string('employee_desc');
            $table->string('interview_address');
            $table->string('contact_person_name');
            $table->string('contact_person_designation');
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
        Schema::dropIfExists('company_details');
    }
}
