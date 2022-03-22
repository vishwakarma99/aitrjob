<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->integer('plan_amount');
            $table->string('service_tax_gst');
            $table->string('total_pay');
            $table->string('coupon_code')->nullable();
            $table->string('validity')->nullable();
            $table->string('plan_benefit1')->nullable();
            $table->string('plan_benefit2')->nullable();
            $table->string('plan_benefit3')->nullable();
            $table->string('plan_benefit4')->nullable();
            $table->string('plan_benefit5')->nullable();
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
        Schema::dropIfExists('plans');
    }
}
