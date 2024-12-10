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
        Schema::create('coal_tips', function (Blueprint $table) {
            $table->id();
            $table->string('tip_id');
            $table->string('vehical_number');
            $table->string('challan_no');
            $table->string('date');
            $table->float('quantity_kg')->default(0);
            $table->string('type')->default('Good');
            $table->double('rate');
            $table->double('spend')->default(0);
            $table->double('net_amount')->default(0);            
            $table->double('advance')->default(0);
            $table->double('due')->default(0);
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coal_tips');
    }
};
