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
        Schema::create('land_owners', function (Blueprint $table) {
            $table->id();
            $table->string('land_lord',100);
            $table->string('land_lord_address',100);
            $table->string('begha',10)->nullable();
            $table->string('sqt_fet')->default(0);
            $table->string('from_date',10);
            $table->string('to_date',10);
            $table->double('amount')->default(0);
            $table->string('aggrement_date')->nullable();
            $table->string('aggrement_paper')->nullable();
            $table->string('land_location',100)->nullable();
            $table->mediumText('other_details')->nullable();
            $table->double('total')->default(0);
            $table->double('due')->default(0);
            $table->double('advance')->default(0);
            $table->enum('status',['Active','Deactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_owners');
    }
};
