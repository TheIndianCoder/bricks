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
        Schema::create('sand_tips', function (Blueprint $table) {
            $table->id();
            $table->string('vehical_number');
            $table->string('from')->nullable();
            $table->string('where')->nullable();
            $table->string('date');
            $table->string('rate_of_tip');
            $table->integer('no_of_tip');
            $table->double('net_amt')->default(0);
            $table->double('due_amt')->default(0);
            $table->double('pay_amt')->default(0);
            $table->enum('status',['Complete','Pending']);
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sand_tips');
    }
};
