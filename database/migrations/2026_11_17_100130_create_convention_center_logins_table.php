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
        Schema::create('convention_center_logins', function (Blueprint $table) {
            $table->id();
            $table->string('venue_id')->nullable();
            $table->string('incharge_name')->nullable();
            $table->string('convention_name')->nullable();
            $table->string('convention_image')->nullable();
            $table->string('convention_video')->nullable();
            $table->string('centre_type')->nullable();
            $table->string('pincode')->nullable();
             $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('status')->nullable();
            $table->string('noc_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convention_center_logins');
    }
};
