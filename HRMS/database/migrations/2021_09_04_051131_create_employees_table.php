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
            $table->string('employee_ID');
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
            $table->string('department');
            $table->string('jobtitle');
            $table->double('salary')->unsigned();
            $table->date('start_Date');
            $table->date('end_Date');
            $table->string('emergency_Name');
            $table->string('emergency_Contact_Number');
            $table->string('document');
            $table->string('employment');
            $table->string('marital_status');
            $table->string('leave_grade');
            $table->string('employee_grade');
            $table->integer('epf_account_number');
            $table->time('workingSchedule');
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
