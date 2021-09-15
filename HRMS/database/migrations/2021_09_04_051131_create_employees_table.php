<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_ID')->nullable();
            $table->string('ic')->unique();
            $table->string('employee_Name',60);
            $table->string('image');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('race');
            $table->string('country');
            $table->string('national');
            $table->text('address');
            $table->string('contact_number');
            $table->string('email');
            $table->string('department')->nullable();
            $table->string('jobtitle')->nullable();
            $table->double('salary')->unsigned()->nullable();
            $table->date('start_Date')->nullable();
            $table->date('end_Date')->nullable();
            $table->string('emergency_Name');
            $table->string('emergency_Contact_Number');
            $table->string('document');
            $table->string('status');
            $table->string('employment')->nullable();
            $table->string('marital_status');
            $table->string('leave_grade')->nullable();
            $table->string('employee_grade')->nullable();
            $table->integer('epf_account_number')->nullable();
            $table->string('bankname')->nullable();
            $table->bigIncrements('bank_acc_num')->nullable();
            $table->time('workingSchedule')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
