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
        Schema::create('convention_facilities', function (Blueprint $table) {
            $table->id();
            

            $table->foreignId('convention_center_login_id')
                ->constrained('convention_center_logins')
                ->cascadeOnDelete();

            $table->string('facility_name')->nullable();
            $table->string('type')->nullable();
            $table->integer('seating_capacity')->nullable();
            $table->decimal('area', 10, 2)->nullable();
            $table->string('available_status')->default('available');

            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convention_facilities');
    }
};
