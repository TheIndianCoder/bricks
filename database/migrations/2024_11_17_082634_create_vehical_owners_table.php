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
        Schema::create('vehical_owners', function (Blueprint $table) {
            $table->id();
            $table->string('company_name',100);
            $table->string('owner_name',100);
            $table->string('no_of_vehicals')->default(0);
            $table->string('gst_number')->nullable();
            $table->string('registration_no')->nullable();
            $table->double('wallet')->default(0);
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehical_owners');
    }
};
