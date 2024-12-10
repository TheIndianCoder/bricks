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
        Schema::create('soil_tips', function (Blueprint $table) {
            $table->id();
            $table->string('vehical_id',10);
            $table->string('vehical_number',20);
            $table->string('soil_owner',100)->nullable();
            $table->string('soil_owner_id',10);
            $table->string('from')->nullable();
            $table->string('where')->nullable();
            $table->string('date',10);
            $table->double('rate_of_tip')->default(0);
            $table->integer('no_of_tip')->default(0);
            $table->double('net_amt')->default(0);
            $table->enum('status',['Complete','Pending'])->default('Complete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soil_tips');
    }
};
