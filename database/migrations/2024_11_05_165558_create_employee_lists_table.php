<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_lists', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('name');
            $table->integer('group_id');
            $table->integer('consultancy_id')->default(0);
            $table->string('mobile_no')->nullable();
            $table->string('home_mobile')->nullable();
            $table->string('aadhar_no');
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('father_name')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('pin_code')->nullable();
            $table->mediumText('local_address')->nullable();
            $table->string('local_phone_no')->nullable();
            $table->string('local_guardian')->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->double('wallet')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_lists');
    }
};
