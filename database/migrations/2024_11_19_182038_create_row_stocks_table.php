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
        Schema::create('row_stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('soil_tip')->default(0);
            $table->bigInteger('sand')->default(0);
            $table->float('coal_kg')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('row_stocks');
    }
};
