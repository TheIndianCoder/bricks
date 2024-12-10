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
        Schema::create('soil_owners', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('address');
            $table->string('contact_no',20); //
            $table->string('bigha')->default(0);
            $table->double('deal_amt')->default(0); //
            $table->double('total')->default(0);
            $table->double('due')->default(0);
            $table->double('advance')->default(0);
            $table->string('aggrement_paper')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soil_owners');
    }
};
