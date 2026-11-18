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
        Schema::create('convention_halls', function (Blueprint $table) {
            $table->id();
         $table->foreignId('convention_center_login_id')
                ->constrained('convention_center_logins')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('hall_id')->nullable();

            $table->string('venue_id')->nullable();
            $table->string('hall_name');
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->foreign('hall_id')
                ->references('id')
                ->on('convention_halls')
                ->nullOnDelete();
              
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convention_halls');
    }
};
