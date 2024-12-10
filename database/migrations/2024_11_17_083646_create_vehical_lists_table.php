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
        Schema::create('vehical_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->references('id')->on('vehical_groups')->onDelete('cascade');
            $table->foreignId('owner_id')->references('id')->on('vehical_owners')->onDelete('cascade');
            $table->string('vehical_number')->unique();
            $table->string('chassis_number');
            $table->double('wallet')->default(0);
            $table->enum('good_for_working',['Yes','No'])->default('Yes');
            $table->integer('driver_id');
            $table->enum('status',['Active','Inactive'])->default('Active');         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehical_lists');
    }
};
