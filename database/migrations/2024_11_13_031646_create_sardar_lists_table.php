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
        Schema::create('sardar_lists', function (Blueprint $table) {
            $table->id();
            $table->string('sardar_id')->unique();
            $table->string('consultancy_name',100)->nullable();
            $table->string('contact_person',100);
            $table->double('wallet')->default(0);
            $table->mediumText('address')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('mobile1')->unique();
            $table->string('mobile2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sardar_lists');
    }
};
